<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videogames', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('category');
            $table->text('details');
            $table->float('price');
            $table->text('designer');
            $table->integer('pg');
            $table->text('keyword');
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videogames');
    }
}
