<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Special extends Model {


		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'specials';

	protected $dates = ['end_time'];


	public function imageSpecials(){

		return $this->hasMany('App\images_Specials','special_id','id');
	}




}