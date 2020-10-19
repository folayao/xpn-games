<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VideoGame;
use Carbon\Carbon;

class NewVideoGamesApi extends Controller
{
    public function index()
    {
        $date = Carbon::today()->subDays(1);

        return VideoGame::where('created_at','>=',$date)->get();
        // return VideoGame::all();
    }

    public function show($id)
    {
        return VideoGame::findOrFail($id);
    }
}
