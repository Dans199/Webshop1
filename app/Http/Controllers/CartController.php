<?php namespace App\Http\Controllers;
use App\Grupas as Grupas;
use App\Image_groups as Image_groups;
use App\category as Category;
use App\Products as Product;


class CartController extends Controller {


	public function getCart()
	{

		$cart = \Cart::content();
		$total=\Cart::total();
		return view('cart')->with('cart', $cart)->with('total', $total);


	}

	public function addCart($id)
	{
		 $name = Product::where('id', $id)->pluck('title');
		 $price = Product::where('id', $id)->pluck('price');


		\Cart::add( $id, $name, 1 ,$price, array('size' => 'large'));

		return \Redirect::route('cart');

	}

	public function deleteCart($rowId)
	{
		\Cart::remove($rowId);
		return \Redirect::route('cart');

	}

	public function Addqty($rowId)
	{

		Cart::update($rowId, array('$qty' =>'+1' ));
		return \Redirect::route('cart');

	}

	public function Lowerqty($rowId)
	{

		Cart::update($rowId, array('$qty' => '-1'));
		return \Redirect::route('cart');

	}



}
