<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersWishlistsTable extends Migration
{
       /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_wishlists', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('wish_list_id');

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('wish_list_id')->references('id')->on('wishlists')->onDelete('cascade');

        $table->primary(['user_id','wish_list_id']);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_wishlist');
    }
}
