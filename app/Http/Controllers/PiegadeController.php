<?php namespace App\Http\Controllers;

class PiegadeController extends Controller {

		/*
	|--------------------------------------------------------------------------
	| Piegades controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for returning delivery information.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('piegade');
	}

}