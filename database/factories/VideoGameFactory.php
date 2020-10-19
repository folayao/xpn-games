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
        'title'    => $faker->randomElement(['Fifa21','Fifa20','Fifa19','Fifa18','Fifa17','Fifa16']),
        'category' => $faker->randomElement(['Action','Simulation','Sports','FPS','Adventure','Rpg']),
        'details'  => $faker->randomElement(['This is an Game, Enjoy','This is a simulation Game, Enjoy','This is a sports Game, Enjoy','This is a FPS Game, Enjoy','This is an adventure Game, Enjoy','This is a RPG Game, Enjoy']),
        'price'    => $faker->numberBetween($min = 20, $max = 1000),
        'designer' => $faker->name(),
        'pg'       => $faker->numberBetween($min = 6, $max = 18),
        'keyword'  => $faker->word(),
    ];
});
