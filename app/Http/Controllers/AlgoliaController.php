<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlgoliaController extends Controller
{
    public function search(Request $request)
    {
        return \App\Models\VideoGame::search($request->input($request->query))->get();
    }
}
