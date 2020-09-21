<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishListVideoGamesTable extends Migration
{
        /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists_videogames', function (Blueprint $table) {
        $table->unsignedBigInteger('wish_list_id');
        $table->unsignedBigInteger('video_game_id');

        $table->foreign('wish_list_id')->references('id')->on('wishlists')->onDelete('cascade');
        $table->foreign('video_game_id')->references('id')->on('videogames')->onDelete('cascade');

        $table->primary(['wish_list_id','video_game_id']);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlists_videogames');
    }
}
