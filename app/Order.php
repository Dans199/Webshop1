<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {


		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';

		public function Order(){

		return $this->belongsTo('app/User');
	}

}
