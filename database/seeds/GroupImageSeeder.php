	<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Grupas as Grupas;

class GroupTableSeeder extends Seeder
{
	public function run()
	{
		
		$this->command->info('Running GroupTableSeeder...');

		// Clean database.
	 	DB::table('grupas')->delete();

		$this->command->info('Cleared `grupas` table.');

	 	// Create base entries.
    	Grupas::create(array(
    		'Group_name' => 'Datori',
    		'Group_desc' => 'Visa veida datori'
		));

		$this->command->info('Added "Datori" group.');

    	Grupas::create(array(
    		'Group_name' => 'Apple',
    		'Group_desc' => 'Visa veida apple Iekārtas'
		));

		$this->command->info('Added "Apple" group.');

    	Grupas::create(array(
    		'Group_name' => 'Komponentes',
    		'Group_desc' => 'Visa veida Komponentes'
		));

		$this->command->info('Added "Komponentes" group.');

    	Grupas::create(array(
    		'Group_name' => 'Laptopi',
    		'Group_desc' => 'Visa veida Laptopi'
		));

		$this->command->info('Added "Laptopi" group.');

    	Grupas::create(array(
    		'Group_name' => 'Monitori',
    		'Group_desc' => 'Visa veida Monitori'
		));

		$this->command->info('Added "Monitori" group.');

    	Grupas::create(array(
    		'Group_name' => 'Printeri un Skaneri',
    		'Group_desc' => 'Printeri un Skaneri'
		));

		$this->command->info('Added "Printeri un Skaneri" group.');
	}
}