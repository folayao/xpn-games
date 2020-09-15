<?php
//<!-- Hecho por Alejandro Arango, Controlador de usuario -->
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VideoGame;
use App\Models\Comment;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
class UserController extends Controller
{
    public function wishList($id)
    {
        $data = [];
        $videogame = VideoGame::findOrFail($id);
        $data["videogame"] = $videogame;
        $data['user'] = auth()->user();
        $data['comments'] = Comment::all();
        $user = User::find(auth()->user()->id);
        $user->addWishlist($id);
        dd($user->wishlist);
        return back()->with("data", $data);
    }

    public function index()
    {
        $users = User::orderBy('id','desc')->get();

        return view('admin.users.index',['users' => $users]);
    }

}
