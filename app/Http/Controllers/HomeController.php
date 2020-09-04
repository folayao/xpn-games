<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
    public function index() {
        // Aquí van las líneas que recogen top products
        return view('home.index');
    }

    public function contact() {
        return view('home.contact');
    }
}
