<?php
namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;
use App\Models\WishList;
trait UserRelations
{
    /**
     * @return mixed
     */
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

    public function wishlists()
    {
        return $this->belongsToMany(WishList::class,'users_wishlists');
    }

}