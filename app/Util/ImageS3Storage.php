<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageS3Storage implements ImageStorage
{

    public function store($request)
    {   

        if ($request->hasFile('gameImage') && $request->type == 'S3') {
          
           $path =  $request->file('gameImage')->store('images','s3');
            return Storage::disk('s3')->url($path);
        }
    }
}