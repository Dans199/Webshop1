	<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Image_groups as Image_group;

class ImageGroupTableSeeder extends Seeder
{
	public function run()
	{
		
		$this->command->info('Running ImageGroupTableSeeder...');

		// Clean database.
	 	DB::table('images_group')->delete();

		$this->command->info('Cleared `Image grupas` table.');

	 	// Create base entries.
    	Image_group::create(array(
    		'image' => 'upload/group_1.jpg',
    		'grupas_ID'=>'1'
    		
		));

		$this->command->info('Added "Datori" group.');

    	Image_group::create(array(
    		'image' => 'upload/group_2.png',
    		'grupas_ID'=>'2'

		));

		$this->command->info('Added "Apple" group.');

    	Image_group::create(array(
    		'image' => 'upload/group_3.jpg',
    		'grupas_ID'=>'3'
  
		));

		$this->command->info('Added "Komponentes" group.');

    	Image_group::create(array(
    		'image' => 'upload/group_4.jpg',
    		'grupas_ID'=>'4'

		));

		$this->command->info('Added "Laptopi" group.');

    	Image_group::create(array(
    		'image' => 'upload/group_5.jpg',
    		'grupas_ID'=>'5'

		));

		$this->command->info('Added "Monitori" group.');

    	Image_group::create(array(
    		'image' => 'upload/group_6.jpg',
    		'grupas_ID'=>'6'

		));

		$this->command->info('Added "Printeri un Skaneri" group.');
	}
}