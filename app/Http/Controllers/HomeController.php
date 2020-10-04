<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return \view('home');
    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
