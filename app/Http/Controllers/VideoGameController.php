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
        $data["category"] = $videogame->getCategory();
        $data["details"] = $videogame->getDetails();
        $data["price"] = $videogame->getPrice();
        $data["designer"] = $videogame->getDesigner();
        $data["pg"] = $videogame->getPg();
        $data["keyword"] = $videogame->getKeyword();

        return \view('videogame.show')->with("data", $data);
    }

    public function create()
    {
        $data = [];
        $data['title'] = "Create VideoGame";
        $data['videogames'] = Product::all();
        /* Return the view with the data of the video games */
        return \view('videogames.create')->with("data", $data);
    }

    public function delete(VideoGames $videogame)
    {
        /* Delete a specific game */
        $videogame->delete();
        return \back();

    }

    public function save(Request $request)
    {
        /* This validate the fields that were pass*/
        $request->validate([
            "title" => "required",
            "category" => "required|text",
            "detail" => "required|text",
            "price" => "required|numeric|gt:0",
            "designer" => "required|text",
            "pg" => "required|numeric",
            "keyword" => "required|text",
        ]);

        VideoGames::create($request->only([
            'title',
            'category',
            'detail',
            'price',
            'designer',
            'pg',
            'keyword',
        ]));

        return back()->with('success', 'Item Created Succesfully');
    }

}
