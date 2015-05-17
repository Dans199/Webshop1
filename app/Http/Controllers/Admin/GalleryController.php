<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa;
use App\Category ;
use App\Products ;
use App\Image_Category;
use App\Image_groups ;
use App\Image_Product;

class GalleryController extends Controller{

  public function showGalleries()
    {

   	return view('Admin/Gallery.Gallery');

  	}

  public function showgroups()
    {
	    $grupas=Grupa::latest()->paginate(10);
	    $groups=Image_groups::latest()->paginate(10);
	   	return view('Admin/Gallery.Gallery_group')->with('groups',$groups)->with('grupas',$grupas);

  	}

  public function showcategoties()
    {
	    $categories=Category::latest()->paginate(10);
	    $Image_Category=Image_Category::latest()->paginate(10);
	   	return view('Admin/Gallery.Gallery_category')->with('Image_Category',$Image_Category)->with('categories',$categories);

  	}



}