<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\VideoGame;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VideoGameController extends Controller
{
    /* List the products */
    function list() {
        $data = [];

        $videogame = VideoGame::paginate(20);
        return view('videogame.list', ["videogames" => $videogame]);
    }

    public function show($id)
    {
        $data = [];
        $videogame = VideoGame::findOrFail($id);
        $data["videogame"] = $videogame;
        
        $data['comments'] = $videogame->comments();
        return view('videogame.show')->with("data", $data);
    }


    public function create()
    {
        $data = [];
        $data['title'] = "Create VideoGame";
        $data['videogames'] = VideoGame::all();
        return view('videogame.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        VideoGame::validateVideoGame($request);
        VideoGame::create($request->all());
        return back()->with('success', 'Item Created Succesfully');
    }

    public function delete($id)
    {
        try {
            $videogame = VideoGame::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home.index');
        }
        $videogame = VideoGame::find($id);
        $videogame->delete();
        return redirect()->route('videogame.list');
    }

}
