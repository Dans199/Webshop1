<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categorys';

		public function grupas(){

		return $this->belongsTo('App\Grupas');
	}

	public function products(){

		return $this->hasMany('App\Products');
	}

	public function imageCategory(){

		return $this->hasMany('App\Image_Category','category_id','id');
	}

}
