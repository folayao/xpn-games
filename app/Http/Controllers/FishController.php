<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FishController extends Controller
{
    public function index()
    {
        $response = Http::get('http://ec2-3-86-109-59.compute-1.amazonaws.com/public/api/videogames');
        // $response = Http::get('http://aqualife.tk/public/api/fish');
        $fishes = $response->json();
        dd($fishes['data']);
        return view('apiFish.index', compact('fishes'));
    }
}
