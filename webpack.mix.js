const mix = require('laravel-mix');


/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel application. By default, we are compiling the Sass
| file for the application as well as bundling up all the JS files.
|
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    
//#red
mix.sass('./resources/sass/principalPage.scss', 'public/css')
    .sass('./resources/sass/showVideogame.scss', 'public/css')
    .sass('./resources/sass/createVideogame.scss', 'public/css')
//#
