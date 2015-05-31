<?php namespace App\Http\Controllers;
use App\Grupas as Grupas;
use App\Image_groups as Image_groups;
use App\category as Category;
use App\Products as Product;


class CartController extends Controller {

		/*
	|--------------------------------------------------------------------------
	| Cart controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling  all shoping cart functions.
	|
	*/


	public function getCart() //gets the  content of the cart
	{

		$cart = \Cart::content();
		$total=\Cart::total();
		return view('cart')->with('cart', $cart)->with('total', $total);


	}

	public function addCart($id) // adds products cart and returns jsano to jquery fuction
	{
		 $name = Product::where('id', $id)->pluck('title');
		 $price = Product::where('id', $id)->pluck('price');


		\Cart::add( $id, $name, 1 ,$price);

	   return response()->json( ['success' => true, 'name'=>$name]);

	}

	public function deleteCart($rowId) // delete an item from cart
	{
		\Cart::remove($rowId);
		return \Redirect::route('cart');

	}


}
