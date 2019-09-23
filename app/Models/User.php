<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Yadahan\AuthenticationLog\AuthenticationLogable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, AuthenticationLogable;

    /**
     * Conexão teste Postgre
     */
//    protected $connection = 'pgsql';

//    protected $connection = 'sqlsrv-website';

    protected $table = 'tb_sinpro_usuarios';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'username', 'senha',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 'remember_token',
    ];

    /**
     * Retorna senha
     *
     * @return mixed|string
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'user' => [
                'id_usuario' => $this->id,
                'nome' => $this->nome,
                'username' => $this->username,
            ]
        ];
    }
}
