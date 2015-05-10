<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {


		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order_items';

		public function order(){

		return $this->belongsTo('app\Order');
	}

}