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
	| Shopp section controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for all requests in shope section
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
	public function index() //returns pruct group view
	{


		$groups = Grupas::all();
		$Image_groups=Image_groups::all();
		return view('veikals')->with('groups', $groups)->with('Image_groups', $Image_groups);

	}

	public function category($id)// returns category view
	{
		$group =Grupas::find($id);
		$categorys = Category::where('grupas_ID', $id)->get();
		$Image_Category=Image_Category::all();


		if ($categorys == null)
		{
			return \Redirect::route('veikals')->with('fail', "That category doesn't exist.");
		}
		// $threads = $category->threads()->get();

		return view('category')->with('categorys', $categorys)->with('Image_Category', $Image_Category)->with('group', $group);
	}

	public function product($id) // returns product view
	{
		$category=Category::find($id);
		$group_id=$category->grupas_ID;
		$group =Grupas::find($group_id);
		$products = Product::where('category_ID', $id)->get();
		$Image_Products=Image_Product::all();
		if ($products == null)
		{
			return \Redirect::route('veikals')->with('fail', "That category doesn't exist.");
		}
		// $threads = $category->threads()->get();

		return view('products')->with('products', $products)->with('Image_Products', $Image_Products)->with('category', $category)->with('group', $group);
	}

	public function product_info($id) // returns product description view
	{

		$product = Product::find($id);
		$Category_id=$product->category_ID;
		$category=Category::find($Category_id);
		$group_id=$category->grupas_ID;
		$group=Grupas::find($group_id);
		$Image_Product=Image_Product::where('product_id', $id)->first();


		if ($product == null)
		{
			return \Redirect::route('veikals')->with('fail', "That category doesn't exist.");
		}


		return view('product_info')->with('product', $product)->with('Image_Product', $Image_Product)->with('category', $category)->with('group', $group);
	}
}
