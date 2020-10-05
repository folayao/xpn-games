<?php

namespace App\Models;

use App\Traits\UserRelations;
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

    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function wishlists()
    {
        return $this->belongsToMany(WishList::class,'users_wishlists');
    }
}
