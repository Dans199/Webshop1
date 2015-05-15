<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;

class OrderItemsController extends Controller{


	public function updateProductOption($id)
	{

	    $products= Product::where('category_ID', $id)->get();

	    return response()->json(['success' => true, 'products' =>  $products]);

	}



}
	

