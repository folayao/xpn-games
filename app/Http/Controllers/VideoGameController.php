<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\VideoGame;
use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Storage;

class VideoGameController extends Controller
{
    public static $categorias = ['Action','Simulation','RPG','FPS','Adventure','Sports'];
    /* List the products */
    public function list(Request $request) {
        $data = [];
        $date = Carbon::today()->subDay(1);
        if($request->category){
            $videogames = VideoGame::where('category',$request->category)->paginate(12);
            $latestVideogames = VideoGame::where('created_at','>=',$date)->where('category',$request->category)->get();

        }
        else{
            if($request->title){
                $videogames = VideoGame::search($request->title)->paginate(12);
                $videogamesid = VideoGame::search($request->title)->get()->pluck('id');
                $latestVideogames = VideoGame::where('created_at','>=',$date)->where('id',$videogamesid)->get();
            }
            else{
                $videogames = VideoGame::orderBy('created_at','desc')->paginate(12);
            }
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
        $data['videos'] = $this->showVideos($videogame->getTitle());
        // dd($data['videos']);
        return view('videogame.show')->with("data", $data);
    }


    public function create()
    {
        $data = [];

        $data['title'] = "Create VideoGame";
         $data['categorias']=VideoGameController::$categorias;
        return view('videogame.create');
    }

    public function save(Request $request)
    {

        VideoGame::validateVideoGame($request);

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


    /**
     *  Videos
     */
    public function showVideos($title)
    {
        $word = $title;
        $youtube = new \Madcoda\Youtube\Youtube(array('key' => 'AIzaSyD7tst8nKTADpj0ZBdr-1VaTPx3RQQOpuo'));
        // Parametros
        $params = array(
            'q' => $word,
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => 5    //Número de resultados
        );
        // Hacer la busqueda con los parametros
        $videos = $youtube->searchAdvanced($params, true);

        return $videos;
    }

}
