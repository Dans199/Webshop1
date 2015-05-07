<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
