<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageS3Storage implements ImageStorage
{
    public function store($request)
    {
        if ($request->hasFile('gameImage') && $request->type == 'user') {
            Storage::disk('s3')->put($request->file('gameImage')->getClientOriginalName(), file_get_contents($request->file('gameImage')->getRealPath()));
        }
    }
}