<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLcgalleryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('gal_id');
			$table->integer('gal_proprietor')->unsigned();
			$table->string('gal_name');
			$table->integer('gal_order')->unsigned();
			$table->string('gal_status');
			$table->integer('gal_created_by')->unsigned();
            $table->timestamps();
		});
		
        Schema::create('pictures', function (Blueprint $table) {
            $table->increments('pic_id');
			$table->integer('pic_gallery')->unsigned();
			$table->string('pic_path');
			$table->string('pic_description');
			$table->string('pic_status');
			$table->integer('pic_created_by')->unsigned();
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
        //
        Schema::drop('galleries');
		Schema::drop('pictures');
    }
}
