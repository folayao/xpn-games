<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\VideoGame;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Storage;

class VideoGameController extends Controller
{
    /* List the products */
    function list(Request $request) {
        $data = [];
        $date = Carbon::today()->subDay(1);
        if($request->category){
            $videogames = VideoGame::where('category',$request->category)->paginate(12);
            $latestVideogames = VideoGame::where('created_at','>=',$date)->where('category',$request->category)->get();

        }
        else{
            $videogames = VideoGame::orderBy('created_at','desc')->paginate(12);

            $latestVideogames = VideoGame::where('created_at','>=',$date)->get();
        }
        $data["videogames"] = $videogames;

        $data["latestVG"] = $latestVideogames;
        $data["quantityNewVG"] = sizeof($data["latestVG"]);

        return view('videogame.list')->with("data", $data);

    }

    public function show($id)
    {
        $data = [];
        $videogame = VideoGame::findOrFail($id);
        $data["videogame"] = $videogame;

        // $data['comments'] = $videogame->comments();
        // dd($data['comments']);
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

        $videoGame = VideoGame::create($request->only('title','category','details','price','designer','pg','keyword','comments'));

        // $videoGame = new VideoGame();
        // $videoGame -> title = $request -> title;
        // $videoGame -> category = $request -> category;
        // $videoGame -> details = $request -> details;
        // $videoGame -> price = $request -> price;
        // $videoGame -> designer = $request -> designer;
        // $videoGame -> pg = $request -> pg;
        // $videoGame -> keyword = $request -> keyword;
        // $videoGame -> comments = $request -> comments;

        if($request->hasFile('gameImage')){

            $path =$request->file('gameImage')->store('images','s3');

            $videoGame -> image = Storage::disk('s3')->url($path);
            $videoGame->save();

        }


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
