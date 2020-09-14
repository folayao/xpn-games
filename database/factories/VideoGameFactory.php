<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VideoGame;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(VideoGame::class, function (Faker $faker) {
    return [
        'title'    => $faker->words($nb = 3, $asText = true),
        'category' => $faker->word(),
        'details'  => $faker->text(),
        'price'    => $faker->numberBetween($min = 20, $max = 1000),
        'designer' => $faker->name(),
        'pg'       => $faker->numberBetween($min = 6, $max = 18),
        'keyword'  => $faker->word(),
    ];
});
