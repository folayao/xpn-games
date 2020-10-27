<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store($request)
    {   
        if ($request->hasFile('gameImage') && $request->type =='Local') {
            Storage::disk('public')->put($request->file('gameImage')->getClientOriginalName(), file_get_contents($request->file('gameImage')->getRealPath()));
            // $request->file('gameImage')->store('images','local');
        }
        if ($request->hasFile('gameImage') && $request->type =='S3') {
            // Storage::disk('public')->put($request->file('gameImage')->getClientOriginalName(), file_get_contents($request->file('gameImage')->getRealPath()));
            // $request->file('gameImage')->store('images','local');
            $request->file('gameImage')->store('images','s3');
        }
    }
}