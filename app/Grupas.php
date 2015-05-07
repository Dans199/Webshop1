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


		public function images_group(){

		return $this->belongsTo('images_group','group_image');
	}
}


