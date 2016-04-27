<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('of_id');
            $table->date('of_date');
            $table->integer('of_property')->unsigned();
            $table->integer('of_buyer')->unsigned()->nullable();
            $table->integer('of_owner')->unsigned()->nullable();
            $table->text('of_property_address');
            $table->string('of_buyer_name');
            $table->string('of_buyer_address');
            $table->string('of_buyer_ic');
            $table->string('of_buyer_tel');
            $table->string('of_owner_name');
            $table->string('of_owner_ic');
            $table->string('of_owner_tel');
            $table->string('of_status');
            $table->string('of_attachment_path');
            $table->decimal('of_purchase_price', 15, 2)->default(0);
            $table->decimal('of_downpayment_percent', 15, 2)->default(0);
            $table->integer('of_paid_within')->default(0);
            $table->integer('of_grace_period')->default(0);
            $table->decimal('of_grace_interest_percent', 15, 2)->default(0);
            $table->timestamps();
            $table->foreign('of_property')->references('prop_id')->on('properties')
                ->onUpdate('cascade');
            $table->foreign('of_buyer')->references('id')->on('users')
                ->onUpdate('cascade');
            $table->foreign('of_owner')->references('id')->on('users')
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
        Schema::drop('offers');
    }
}
