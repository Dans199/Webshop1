<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_Category extends Model {

		protected $table = 'image_Category';


	public function category(){

		return $this->belongsTo('App\Category');
	}


}
