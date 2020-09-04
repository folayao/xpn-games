<?php

namespace App\Http\Controllers;

class HeaderControllerLayout extends Controller
{

    public function index()
    {
        return \view('header');
    }
}
