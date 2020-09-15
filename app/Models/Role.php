<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Role extends Model
{
    public static function validateRole(Request $request){
        //validate the role fields
        $request->validate([
            'role_name' => 'required|max:255',
            'role_slug' => 'required|max:255'
        ]);
    }

    protected $fillable = [
        'name','slug','description','full-access',
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class ,'roles_permissions');
    }
    public function allRolePermissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
    public function getId()
    {
        return $this->attributes['id'];
    }
}
