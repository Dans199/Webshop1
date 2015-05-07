<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_items', function($table) {
                $table->increments('id');
                $table->integer('quantity'); 
                $table->decimal('cena',10,2);
                $table->integer('product_id')->unsigned();
                $table->foreign('product_id')->references('id')->on('products'); 
                $table->integer('order_id')->unsigned();
                $table->foreign('order_id')->references('id')->on('orders');
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
		Schema::drop('order_items');
	}
	

}
