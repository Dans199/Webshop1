<?php namespace App\Http\Controllers;
use App\Special;
use App\images_Specials;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
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
		$Specials = Special::Latest()->get();
		$images_Specials= images_Specials::Latest()->get();

		$dt = new \DateTime();
		$currentTime=$dt->format('Y-m-d H:i:s');

		return view('hello')->with('Specials', $Specials)->with('images_Specials', $images_Specials)->with('currentTime', $currentTime);
	}

}
