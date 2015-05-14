<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Grupas extends Model {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grupas';

	protected $fillable = ['Group_name', 'Group_desc'];

		public function category(){

		return $this->hasMany('App\Category');
	}

	public function imagegroups(){

		return $this->hasMany('App\Image_groups','grupas_ID','id');
	}

}


