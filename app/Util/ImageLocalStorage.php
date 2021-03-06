<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ImageLocalStorage implements ImageStorage
{
    public function store($request)
    {
        if ($request->hasFile('gameImage') && $request->type =='Local') {

                Storage::disk('public')->put($request->gameImage->getClientOriginalName(),file_get_contents($request->file('gameImage')->getRealPath()));

            
            return  URL::asset('storage/'.$request->gameImage->getClientOriginalName()) ;
        }
    }
}
