<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;

class OrdersItemsController extends Controller{


	public function updateProductOption($id)
	{

	    $products= Products::where('category_ID', $id)->get();

	    return response()->json(['success' => true, 'products' =>  $products]);

	}

	public function updateCategoryOption($id)
	{

	    $Category= Category::where('grupas_ID', $id)->get();

	    return response()->json(['success' => true, 'Category' =>  $Category]);

	}




}
	

