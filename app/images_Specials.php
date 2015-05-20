<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class images_Specials extends Model {


		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'images_special';


	public function special(){

		return $this->belongsTo('App\Special');
	}

}