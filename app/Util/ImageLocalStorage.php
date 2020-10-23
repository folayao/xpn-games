<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store($request)
    {
        if ($request->hasFile('gameImage')) {
            Storage::disk('public')->put($request->file('gameImage')->getClientOriginalName(), file_get_contents($request->file('gameImage')->getRealPath()));
        }
    }
}
