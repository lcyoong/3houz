<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_keys', function (Blueprint $table) {
            $table->increments('ofk_id');
            $table->integer('ofk_property')->unsigned();
            $table->integer('ofk_buyer')->unsigned();
            $table->foreign('ofk_property')->references('prop_id')->on('properties')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ofk_buyer')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('offer_keys');
    }
}
