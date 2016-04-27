<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyUnlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_unlocks', function (Blueprint $table) {
            $table->increments('pul_id');
            $table->integer('pul_property')->unsigned();
            $table->integer('pul_owner')->unsigned();
            $table->timestamps();
            $table->foreign('pul_property')->references('prop_id')->on('properties')
                ->onUpdate('cascade');
            $table->foreign('pul_owner')->references('id')->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('property_unlocks');
    }
}
