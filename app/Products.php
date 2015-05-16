<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {


		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

		public function category(){

		return $this->belongsTo('App\Category');
	}

	public function orderitem(){

		return $this->hasMany('App\OrderItem','product_id','id');
	}

	public function imageProduct(){

		return $this->hasMany('App\Image_Product','product_id','id');
	}

}
