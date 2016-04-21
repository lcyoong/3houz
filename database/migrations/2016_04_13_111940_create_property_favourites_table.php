<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_favourites', function (Blueprint $table) {
            $table->increments('fav_id');
            $table->integer('fav_owner')->unsigned();
            $table->integer('fav_property')->unsigned();
            $table->timestamps();

            $table->foreign('fav_owner')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fav_property')->references('prop_id')->on('properties')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('property_favourites');
    }
}
