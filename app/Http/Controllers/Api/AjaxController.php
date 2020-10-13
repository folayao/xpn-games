<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function create()
    {

      return view('videogame');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        #create or update your data here

        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}