<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagegrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
					Schema::create('images_group', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image');
			$table->integer('grupas_ID')->unsigned();
			$table->foreign('grupas_ID')->references('id')->on('grupas');
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
		Schema::drop('images_group');
	}

}
