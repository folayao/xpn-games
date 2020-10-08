<?php
//<!-- Hecho por Alejandro Arango, Controlador de usuario -->
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return view('admin.users.index',['users' => $users]);
    }

    public function create(Request $request)
    {
        if($request->ajax()){
            $roles = Role::where('id', $request->role_id)->first();
            $permissions = $roles->permissions;

            return $permissions;
        }

        $roles = Role::all();
        
        return view('admin.users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        //validate the fields
        User::validateUser($request);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect('/users');
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();
        $userRole = $user->roles->first();
        if($userRole != null){
            $rolePermissions = $userRole->allRolePermissions;
        }else{
            $rolePermissions = null;
        }
        $userPermissions = $user->permissions;

        // dd($rolePermission);

        return view('admin.users.edit', [
            'user'=>$user,
            'roles'=>$roles,
            'userRole'=>$userRole,
            'rolePermissions'=>$rolePermissions,
            'userPermissions'=>$userPermissions
            ]);
    }


    public function update(Request $request, $id)
    {

        //validate the fields
        $user=User::find($id);
        User::validateUser($request);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        $user->permissions()->detach();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }
        return back();
    }

    public function delete($id)
    {

        $user =User::findorfail($id);
        $user->permissions()->detach();
        $user->roles()->detach();
        $user->delete();
        $users = User::orderBy('id','desc')->get();

        return view('admin.users.index',['users' => $users]);
    }

    public function userSettings(){
        return view('user.user_settings');

    }
}
