<?php

namespace App\Models;

use App\Traits\UserRelations;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable, UserRelations;

    protected $table = "users";

    protected $fillable = [
        'name','email','password','username','address'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
}
