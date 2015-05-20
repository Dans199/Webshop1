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

  public function showcategories()
    {
	    $categories=Category::latest()->paginate(10);
	    $Image_Category=Image_Category::latest()->paginate(10);
	   	return view('Admin/Gallery.Gallery_category')->with('Image_Category',$Image_Category)->with('categories',$categories);

  	}

  public function showproducts()
    {
	    $Products=Products::latest()->paginate(10);
	    $Image_Product=Image_Product::latest()->paginate(10);
	   	return view('Admin/Gallery.Gallery_product')->with('Image_Product',$Image_Product)->with('Products',$Products);
  	}

  	public function groupEdit($id)
    {
		$group= Grupa::find($id);
	    $Image_groups=Image_groups::where('grupas_ID', $id)->first();
	   	return view('Admin/Gallery.Gallery_group_edit')->with('Image_groups',$Image_groups)->with('group',$group);
  	}


  	public function postgroupEdit($id)
    {

	    $Image_groups=Image_groups::where('grupas_ID', $id)->first();

   		$input = \Input::all();
		 $rules = array('image' => 'mimes:jpeg,bmp,png');

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {

                        if (\Input::hasFile('image'))
                        {
						      $destinationPath = 'upload/group'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Group_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						      // sending back with message
						      \Session::flash('success', 'Upload successfully');

						      $path = "upload/group/".$fileName;
						      
	                          $Image_groups->image =$path;
	                          $Image_groups->save();
						}

                          return \Redirect::to('/admin/gallery/Groups')->with('success', "Izmaiņas veiktas!");


     
                } else {
                        return \Redirect::back()->withErrors($validator);
                }

            }


    public function categoryEdit($id)
    {
		 $category=Category::find($id);
		 $Image_Category=Image_Category::where('category_id', $id)->first();
	   	return view('Admin/Gallery.Gallery_category_edit')->with('Image_Category',$Image_Category)->with('category',$category);
  	}

  	  	public function postcategoryEdit($id)
    {

	     $Image_Category=Image_Category::where('category_id', $id)->first();

   		$input = \Input::all();
		 $rules = array('image' => 'mimes:jpeg,bmp,png');

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {

                        if (\Input::hasFile('image'))
                        {
						      $destinationPath = 'upload/category'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Category_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						      // sending back with message
						      \Session::flash('success', 'Upload successfully');

						      $path = "upload/category/".$fileName;
						      
	                          $Image_Category->image =$path;
	                          $Image_Category->save();
						}

                          return \Redirect::to('/admin/gallery/Categories')->with('success', "Izmaiņas veiktas!");


     
                } else {
                        return \Redirect::back()->withErrors($validator);
                }

            }

    public function productsEdit($id)
    {
		 $Products=Products::find($id);
		 $Image_Product=Image_Product::where('product_id', $id)->first();
	   	 return view('Admin/Gallery.Gallery_product_edit')->with('Image_Product',$Image_Product)->with('Products',$Products);
  	}

  	public function postproductsEdit($id)
    {

	    $Image_Product=Image_Product::where('product_id', $id)->first();

   		$input = \Input::all();
		 $rules = array('image' => 'mimes:jpeg,bmp,png');

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {

                        if (\Input::hasFile('image'))
                        {
						      $destinationPath = 'upload/products'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Product_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						      // sending back with message
						      \Session::flash('success', 'Upload successfully');

						      $path = "upload/products/".$fileName;
						      
	                          $Image_Product->image =$path;
	                          $Image_Product->save();
						}

                          return \Redirect::to('/admin/gallery/Products')->with('success', "Izmaiņas veiktas!");


     
                } else {
                        return \Redirect::back()->withErrors($validator);
                }

            }



}