<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('image_category', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categorys');
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
		Schema::drop('image_category');
	}

}
