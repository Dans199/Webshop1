<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;

class OrderItemsController extends Controller{

if(isset($_post['contentVar']))

	$products = Product::where('category_ID', $_post['contentVar'])->get();

foreach ($products as $key => $value) {
		echo "<option value=\"$value->id\">$value->title</option>";
	
		}
	

}