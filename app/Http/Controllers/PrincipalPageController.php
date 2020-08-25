<?php

namespace App\Http\Controllers;

class PrincipalPageController extends Controller{

    public function index()
    {
        return \view('principalPage');
    }
}
