<?php namespace App\Http\Controllers;

class kontaktiController extends Controller {

		/*
	|--------------------------------------------------------------------------
	| Contact controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for returning Contact information.
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
	 *s
	 * @return Response
	 */
	public function index()
	{
		return view('kontakti');
	}

}