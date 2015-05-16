<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_Product extends Model {

		protected $table = 'image_product';


	public function product(){

		return $this->belongsTo('App\Products');
	}


}
