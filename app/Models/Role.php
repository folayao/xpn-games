<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{

    protected $fillable = [
        'name','slug','description','full-access',
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class ,'roles_permissions');
    }
}
