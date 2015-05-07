<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HelloController extends Controller{

  public function showPanel()
   {

    return View('Admin.Panel');

  }

}
