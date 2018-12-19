<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersWebsite extends Model
{
    protected $table = 'tb_sinpro_users_website';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'matricula', 'cpf'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
}
