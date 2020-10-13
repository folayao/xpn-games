<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoGame;

class VideoGameApi extends Controller
{
    public function index()
    {
        $data = [];
        $data["to"] = \csrf_token();
        return $data;
    }

    public function show($id)
    {
        return VideoGame::findOrFail($id);
    }

    public function presave(){
        return view('videogame');

    }

    public function save(Request $request)
    {
        
        $videogame = VideoGame::create();
        $videogame->title = $request->title;
        $videogame->price = $request->price;
        $videogame->category = $request->category;
        $videogame->pg = $request->pg;
        $videogame->designer = $request->designer;
        $videogame->details = $request->details;
        $videogame->keyword = $request->keyword;
        
        dd($videogame);

       return response()->json($videogame, 201);
    }
}