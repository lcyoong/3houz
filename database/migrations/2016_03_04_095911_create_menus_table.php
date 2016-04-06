<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
        	$table->increments('menu_id');
			$table->string('menu_label');
			$table->string('menu_uri');
			$table->integer('menu_parent')->unsigned()->nullable();
			$table->integer('menu_group')->unsigned();
			$table->integer('menu_order')->unsigned();
			$table->integer('menu_created_by')->unsigned();
			$table->string('menu_roles_allowed');
			$table->timestamps();
			
            $table->foreign('menu_created_by')->references('id')->on('users')
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
        Schema::drop('menus');
    }
}
