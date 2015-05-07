<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model {

		public function products(){

		return $this->belongsTo('products','product_image')
	}


}
