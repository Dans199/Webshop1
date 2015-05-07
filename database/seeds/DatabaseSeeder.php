<?php
use database\seeds\ImageGroupTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Grupas as Grupas;
use App\Image_groups as Image_groups;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		 Eloquent::unguard();

		 $this->call('GroupTableSeeder');
		 $this->call('ImageGroupTableSeeder');

	}
}