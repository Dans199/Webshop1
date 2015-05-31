<?php namespace App\Http\Controllers;
use App\Special;
use App\images_Specials;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Wecome controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for returning web pages home screen information.
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
	public function index()// returns the first page of online shop with specials and information abouth shop
	{
		$Specials = Special::Latest()->get();
		$images_Specials= images_Specials::Latest()->get();

		$dt = new \DateTime();
		$currentTime=$dt->format('Y-m-d H:i:s');

		return view('hello')->with('Specials', $Specials)->with('images_Specials', $images_Specials)->with('currentTime', $currentTime);
	}

}
