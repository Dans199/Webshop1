<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Factory;
use Carbon\Carbon;
use \Illuminate\Validation\Validator;

class Special extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required'
			,'end_time' => 'required|date_format:d.m.Y H:i'
			,'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg'
		];
	}

	function validator(Factory $factory)
	{
		$validator = $factory->make(
			$this->all(), $this->rules(), $this->messages(), $this->attributes()
		);

		return $validator;
	}

	function messages()
	{
		return [
			'images' => 'Atļautie faila tipi ir: jpeg,jpg,png,bmp,gif,svg'
		];
	}

}
