<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageS3Storage implements ImageStorage
{

    public function store($request)
    {   
        dd($request);
        if ($request->hasFile('gameImage') && $request->type == 'S3') {
            // Storage::disk('s3')->put($request->file('gameImage')->getClientOriginalName(), file_get_contents($request->file('gameImage')->getRealPath()));
            $request->file('gameImage')->store('images','s3');
            return Storage::disk('s3')->url($path);
        }
    }
}