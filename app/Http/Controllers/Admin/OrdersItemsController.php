<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;

class OrdersItemsController extends Controller{

	/*
	|--------------------------------------------------------------------------
	|OrdersItemsController 
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for geting products true ajax for odered item adding form
	*/

	public function updateProductOption($id)// returns all products under the given category
	{

	    $products= Products::where('category_ID', $id)->get();

	    return response()->json(['success' => true, 'products' =>  $products]);

	}

	public function updateCategoryOption($id)// returns all categories under the given group
	{

	    $Category= Category::where('grupas_ID', $id)->get();

	    return response()->json(['success' => true, 'Category' =>  $Category]);

	}




}
	

