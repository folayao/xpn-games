<?php

namespace App\Http\Controllers;

use App\VideoGames;
use Illuminate\Http\Request;

class VideoGameController extends Controller
{
    /* List the products */
    function list() {
        $data = [];
        $data["title"] = "List of products";
        $data["videogames"] = VideoGames::all();
        return view("videogame.list")->with("data", $data);
    }
    /* Sho */
    public function show($id)
    {
        $data = [];
        $videogame = VideoGames::findOrFail($id);
        $data["title"] = $videogame->getTitle();
        $data["videogames"] = $videogame;
        return \view('videogame.show')->with("data", $data);
    }

    public function create()
    {
        $data = [];
        $data['title'] = "Create VideoGame";
        $data['videogames'] = VideoGames::all();
        /* Return the view with the data of the video games */
        return \view('videogame.create')->with("data", $data);
    }

    public function save(Request $request)
    { /* This validate the fields that were pass*/
        $request->validate([
            "title" => "required",
            "category" => "required",
            "details" => "required",
            "price" => "required|numeric|gt:0",
            "designer" => "required",
            "pg" => "required|numeric",
            "keyword" => "required",
        ]);
        VideoGames::create($request->only([
            'title',
            'category',
            'details',
            'price',
            'designer',
            'pg',
            'keyword',
        ]));
        return back()->with('success', 'Item Created Succesfully');
    }

    public function delete($id)
    {
        try {
            $videogame = VideoGames::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home.index');
        }
        $videogame = VideoGames::find($id);
        $videogame->delete();
        $data = [];
        $data["title"] = "List of products";
        $data["videogames"] = VideoGames::all()->skip(0)->take(2);
        //return view('product.list')->with('data',$data)->with('success','Item deleted successfully!');
        return redirect('videogames/list')->with('data', $data);
    }

}
