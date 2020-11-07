<?php

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Util\ImageLocalStorage;
use App\Util\ImageS3Storage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{

/**
 * Register any application services.
 *
 * @return void
 */

    public function register()
    {
        $this->app->bind(ImageStorage::class, function () {
            if($_REQUEST['type'] == 'S3'){
                return new ImageS3Storage;
            }
            if($_REQUEST['type'] == 'Local'){
                return new ImageLocalStorage;
            }
        });
    }
}
