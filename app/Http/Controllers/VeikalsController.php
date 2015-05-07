<?php namespace App\Http\Controllers;
use App\Grupas as Grupas;
use App\Image_groups as Image_groups;
use App\category as Category;
use App\Products as Product;


class VeikalsController extends Controller {

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


		$groups = Grupas::all();
		$Image_groups=Image_groups::all();
		return view('veikals')->with('groups', $groups)->with('Image_groups', $Image_groups);

	}

	public function category($id)
	{
		$categorys = Category::where('grupas_ID', $id)->get();


		if ($categorys == null)
		{
			return \Redirect::route('veikals')->with('fail', "That category doesn't exist.");
		}
		// $threads = $category->threads()->get();

		return view('category')->with('categorys', $categorys);
	}

	public function product($id)
	{
		$products = Product::where('category_ID', $id)->get();


		if ($products == null)
		{
			return \Redirect::route('veikals')->with('fail', "That category doesn't exist.");
		}
		// $threads = $category->threads()->get();

		return view('products')->with('products', $products);
	}

		public function product_info($id)
	{
		$products = Product::where('id', $id)->get();


		if ($products == null)
		{
			return \Redirect::route('veikals')->with('fail', "That category doesn't exist.");
		}


		return view('product_info')->with('products', $products);
	}
}
