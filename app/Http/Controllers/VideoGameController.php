<?php

namespace App\Http\Controllers;

use App\VideoGames;
use Illuminate\Http\Request;

class VideoGameController extends Controller
{
    public function show($id)
    {
        /* This function show the characteristics of the videogame */
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

/*  public function delete(VideoGames $videogame)
    {
        Delete a specific game 
        $videogame->delete();
        return \back();
    } 
*/

    public function save(Request $request)
    {/* This validate the fields that were pass*/
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
}
