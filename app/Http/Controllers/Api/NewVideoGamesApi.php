<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\VideoGameResource;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\VideoGame;

class NewVideoGamesApi extends Controller
{
    public function index()
    {
        $date = Carbon::today()->subDays(60);
        return VideoGameResource::collection(VideoGame::where('created_at','>=',$date)->get());
    }

    public function show($id)
    {
        return new VideoGameResource(VideoGame::findOrFail($id));
    }
}
