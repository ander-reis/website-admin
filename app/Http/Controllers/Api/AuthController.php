<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @var User
     */
    private $user;

    /**
     * AuthController constructor.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Valida quais campos devem ser pegos da request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'senha');
    }

    /**
     * Configura  novo username
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function accessToken(Request $request)
    {
//        $this->validateLogin($request);

        $credentials = $this->credentials($request);
//        dd(\Auth::guard('api')->attempt($credentials));
        if($token = \Auth::guard('api')->attempt($credentials)){
            return $this->sendLoginResponse($request, $token);
        }

        /**
         * retorna erro no login
         */
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * retorna token
     * @param Request $request
     * @param $token
     * @return array
     */
    protected function sendLoginResponse(Request $request, $token)
    {
        return ['token' => $token];
    }

    /**
     * Altera a mensagem de erro caso os dados sejam invalido no login
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json([
            'error' => \Lang::get('auth.failed'),
            'status_code:' => 400
        ], 400);
    }

    /**
     * metodo invalida o token na lista negra
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        \Auth::guard('api')->logout();

        return response()->json([
            'status_code:' => 204
        ], 204);
    }
}
