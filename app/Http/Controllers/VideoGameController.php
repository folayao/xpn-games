<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\VideoGame;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VideoGameController extends Controller
{
    /* List the products */
    function list() {
        $data = [];
        $videogames = VideoGame::orderBy('created_at','desc')->paginate(20);

        $date = Carbon::today()->subDays(3);
        $latestVideogames = VideoGame::where('created_at','>=',$date)->get();

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
        dd(file('productImage'));
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
