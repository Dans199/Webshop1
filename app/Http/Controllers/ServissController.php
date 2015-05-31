<?php namespace App\Http\Controllers;

class ServissController extends Controller {

		/*
	|--------------------------------------------------------------------------
	| Service controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for returning service information.
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
		return view('serviss');
	}

}