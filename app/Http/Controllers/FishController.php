<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FishController extends Controller
{
    public function index()
    {
        $response = Http::get('http://aqualife.tk/public/api/fish');
        $fishes = $response->json();


        return view('fish.index')->with("data", $fishes['data']);
    }
}
