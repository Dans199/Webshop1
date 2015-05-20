<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageSpecialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images_special', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image');
			$table->integer('special_id')->unsigned();
			$table->foreign('special_id')->references('id')->on('specials');
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
		Schema::drop('images_special');
	}

}
