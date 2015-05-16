<?php namespace App\Http\Controllers;
use App\Grupas as Grupas;
use App\Image_groups as Image_groups;
use App\category as Category;
use App\Products as Product;
use App\Image_Category;
use App\Image_Product;


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
		$Image_Category=Image_Category::all();


		if ($categorys == null)
		{
			return \Redirect::route('veikals')->with('fail', "That category doesn't exist.");
		}
		// $threads = $category->threads()->get();

		return view('category')->with('categorys', $categorys)->with('Image_Category', $Image_Category);
	}

	public function product($id)
	{
		$products = Product::where('category_ID', $id)->get();
		$Image_Products=Image_Product::all();



		if ($products == null)
		{
			return \Redirect::route('veikals')->with('fail', "That category doesn't exist.");
		}
		// $threads = $category->threads()->get();

		return view('products')->with('products', $products)->with('Image_Products', $Image_Products);
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
