<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('prop_id');
            $table->string('prop_label');
            $table->integer('prop_name')->unsigned();
            $table->string('prop_location');
            $table->string('prop_tenure');
            $table->integer('prop_type')->unsigned()->nullable();
            $table->text('prop_description');
            $table->integer('prop_no_bedrooms')->unsigned();
            $table->integer('prop_no_bathrooms')->unsigned();
            $table->integer('prop_built_up')->unsigned();
            $table->string('prop_furnishing');
            $table->string('prop_direction');
            $table->boolean('prop_occupied')->default(0);
            $table->integer('prop_price')->unsigned()->nullable();
            $table->integer('prop_owner')->unsigned();
            $table->string('prop_reference')->nullable();
            $table->char('prop_state', 3);
            $table->integer('prop_created_by')->unsigned();
            $table->timestamps();

            // $table->foreign('prop_owner')->references('mb_id')->on('members')
                // ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prop_owner')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prop_created_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prop_state')->references('state_code')->on('states')
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
        Schema::drop('properties');
    }
}
