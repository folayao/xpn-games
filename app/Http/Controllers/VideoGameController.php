<?php

namespace App\Http\Controllers;

use App\Comment;
use App\VideoGame;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VideoGameController extends Controller
{
    /* List the products */
    function list() {
        $data = [];
        $data["title"] = "List of products";
        $data["videogames"] = VideoGame::all();
        return view('videogame.list')->with("data", $data);
    }
    /* Sho */
    public function show($id)
    {
        $data = [];
        $videogame = VideoGame::findOrFail($id);
        // $data["title"] = $videogame->getTitle();
        $data["videogame"] = $videogame;
        $data['comments'] = Comment::all();  //No sé si debería pasar todo ???
        return view('videogame.show')->with("data", $data);
    }

    public function create()
    {
        $data = [];
        $data['title'] = "Create VideoGame";
        $data['videogames'] = VideoGame::all();
        /* Return the view with the data of the video games */
        return view('videogame.create')->with("data", $data);
    }

    public function save(Request $request)
    { /* This validate the fields that were pass*/
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
