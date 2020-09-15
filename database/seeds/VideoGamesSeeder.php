<?php

use App\VideoGame;
use Illuminate\Database\Seeder;

class VideoGamesSeeder extends Seeder
{

/**
 * Run the database seeds.
 *
 * @return void
 */

    public function run()
    {
        factory(VideoGame::class, 80)->create();
    }
}
