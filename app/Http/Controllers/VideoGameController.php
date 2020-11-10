<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\VideoGame;
use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Http;
use Storage;

class VideoGameController extends Controller
{
    /* List the products */
    public function list(Request $request) {
        $data = [];
        $date = Carbon::today()->subDay(1);
        if($request->paginate){
            $data['paginate'] = $request -> paginate;
        }else{
            $data['paginate'] = 12;
        }
        if($request->category){
            $videogames = VideoGame::where('category',$request->category)->paginate($request -> paginate);
            $latestVideogames = VideoGame::where('created_at','>=',$date)->where('category',$request->category)->get();
        }
        else{
            if($request->search){
                $videogames = VideoGame::search($request->search)->paginate($request -> paginate);
                if($videogames->first() != null){
                $videogamesid = VideoGame::search($request->search)->get()->pluck('id');
                $latestVideogames = VideoGame::where('created_at','>=',$date)->where('id',$videogamesid)->get();

                }
            }
            else{
                $videogames = VideoGame::orderBy('created_at','desc')->paginate($request -> paginate);
            }

            $latestVideogames = VideoGame::where('created_at','>=',$date)->get();
        }
        $data['category'] = $request -> category;
        $data['search'] = $request -> search;

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
        $data['videos'] = $this->showVideos($videogame->getTitle());
        return view('videogame.show')->with("data", $data);
    }


    public function create()
    {
        $data = [];

        $data['title'] = "Create VideoGame";
        
        return view('videogame.create');
    }

    public function save(Request $request)
    {

        VideoGame::validateVideoGame($request);

        $videoGame = VideoGame::create($request->only('title','category','details','price','designer','pg','keyword','comments'));


        if($request->hasFile('gameImage')){
            $storeInterface = app(ImageStorage::class);
            $value = $storeInterface->store($request);
            $videoGame -> image = $value;
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


    /**
     *  Videos
     */
    public function showVideos($title)
    {
        $word = $title;
        $youtube = new \Madcoda\Youtube\Youtube(array('key' => 'AIzaSyD7tst8nKTADpj0ZBdr-1VaTPx3RQQOpuo'));
        // Parametros
        $params = array(
            'q' => $word . ' gameplay',
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => 3    //Número de resultados
        );
        // Hacer la busqueda con los parametros
        $videos = $youtube->searchAdvanced($params, true);

        return $videos;
    }

}
