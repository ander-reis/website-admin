<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Configura novo username
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Valida request user
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'senha' => 'required|string',
        ]);
    }

    /**
     * Valida quais campos devem ser pegos da request
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'senha');
    }

    /**
     * Verifica usuário e cria session
     *
     * @param Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only($this->username(), 'senha');
        $username = $credentials[$this->username()];
        $password = $credentials['senha'];

        $result = $this->ldapAccess($username, $password);

        if(env('DATABASE_TEST_LOCAL')){
            $result['code'] = true;
        }

        if ($result['code']) {
            // se o usuario existe no servidor LDAP, com senha
            $user = User::where($this->username(), $username)->first();

            if (!$user) {
                // o usuario não existe no database e faz o insert
                $user = new User();
                $user->username = $username;
                $user->nome = strtoupper($username);
                $user->senha = Hash::make($password);
            }

            /**
             * cria sessao para o ckfinder
             */
            $_SESSION['isLogged'] = true;

            // registra usuário e cria a session
            $this->guard()->login($user, true);

            return true;
        }
        return false;
    }

    /**
     * Verifica se o usuário existe no server LDAP
     *
     * @param $username
     * @param $password
     * @return bool|mixed|string
     */
    private function ldapAccess($username, $password)
    {
        $data = json_encode(array('user' => $username, 'pass' => $password));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, "http://api1.sinprosp.org.br/ldap/login");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);

        return $result;
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        /**
         * destrui a sessao do ckfinder
         */
        session_destroy();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
