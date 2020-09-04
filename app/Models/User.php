<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    protected $fillable = [
        'name','email','password','username','address'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
