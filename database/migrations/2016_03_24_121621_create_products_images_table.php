<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_image', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_ID')->unsigned();
			$table->integer('image_ID')->unsigned();
			$table->foreign('product_ID')->references('id')->on('products');
			$table->foreign('image_ID')->references('id')->on('images');
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
		Schema::drop('product_image');
	}

}
