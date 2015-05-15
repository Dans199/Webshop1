<?php namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;
use App\Image_groups ;
use App\User as user;

class HelloController extends Controller{

  public function showPanel()
   {



   	if (!\Auth::guest() && \Auth::user()->isAdmin()){

    return View('Admin.Panel');

	}
	else
	{
		return \Redirect::route('Main');

	}

  }

}
