<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_groups extends Model {

		protected $table = 'images_group';


	public function grupas(){

		return $this->belongsTo('App\Grupas');
	}


}
