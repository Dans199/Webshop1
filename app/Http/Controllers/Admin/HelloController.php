<?php namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;
use App\Image_groups ;
use App\User as user;
use App\Order;
use App\OrderItem;

class HelloController extends Controller{

				/*
	|--------------------------------------------------------------------------
	| Hello Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for admin panel wecome screen   
	*/

  public function showPanel()
   {

   	$CurrentUserCount= user::count();
   	$Last5orders=Order::Latest()->take(5)->get();

    return View('Admin.Panel')->with('CurrentUserCount',$CurrentUserCount)->with('Last5orders',$Last5orders);

	}
	
}
