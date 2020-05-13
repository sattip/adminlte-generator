<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->text('voucher');
            $table->text('couriername');
            $table->text('firstname');
            $table->text('lastname');
            $table->text('streetaddress');
            $table->integer('zipcode');
            $table->text('city');
            $table->text('phonenumber');
            $table->date('datecreated');
            $table->text('orderprice');
            $table->text('status');
            $table->boolean('synced');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
