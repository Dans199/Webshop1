<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {


		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';

		public function User(){

		return $this->belongsTo('App\User');
	}

	
		public function orderitem(){

		return $this->hasMany('App\OrderItem','order_id','id');
	}

}
