<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;
use App\Image_Product;

class ProductsController extends Controller{


	/*
	|--------------------------------------------------------------------------
	| Products Controller 
	|--------------------------------------------------------------------------
	|
	|This controller is responsible for products CRUD funcionality 
	*/

  public function showProducts() // Returns all products from database.
   {

   	$Products = Products::Latest()->paginate(5);

   	return view('Admin/Products.Products')->with('Products', $Products);

  	}

   public function AddProducts() // Returns product add new product  form view.
   {

	   	$Categories = Category::all();
	   	return view('Admin/Products.Products_add')->with('Categories', $Categories);
   }

  	public function postProducts() // Posts product add form  input data and validates it.
   	{

   		$input = \Input::all();
		$rules = array('name' => 'required|max:255'
			,'desc' => 'required|max:255'
			,'cat' => 'required|min:1'
			,'price' => 'required|numeric|regex:/^\d*(\.\d{2})?$/'
			,'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg'
			);

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {
                        $Product = new Products();
                        $Product->title = $input['name'];
                        $Product->category_ID = $input['cat'];
                        $Product->price = $input['price'];
                        $Product->description = $input['desc'];

                        $Product->save();

                        if (\Input::file('image')->isValid())
                        {
						      $destinationPath = 'upload/products'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Product_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						      // sending back with message
						      \Session::flash('success', 'Upload successfully');

						      $path = "upload/products/".$fileName;

	                          $Image_Product = new Image_Product();
	                          $Image_Product->image =$path;
	                          $Image_Product->product_id = $Product->id;
	                          $Image_Product->save();
						}


                          return \Redirect::to('/admin/Products')->with('success', "successfully added!");
     
                } else {
                        return \Redirect::to('/admin/Products/add')->withErrors($validator);
                }
		}

	public function DeleteProducts($id) // Deletes product from database and image from server.

   	{			
   		$Product = Products::find($id);
   		$Product->orderitem()->delete();
   	
   		$Upload=Image_Product::where('product_id', $id)->pluck('image');
		$file_path_conv=explode("/",$Upload); // converting url path to local path
		$path=implode("\\",$file_path_conv);
		$Fullpath= public_path()."\\".$path;


	    if(\File::delete($Fullpath)) { //deleting file from server

	    $Product->imageProduct()->delete();

			if ($Product->delete())
			{
				   return \Redirect::back()->with('success', "successfully Deleted");
			}

		}
		else
		{
			return \Redirect::to('/admin/Products')->with('fail', "An error occured while deleting the Product.");
		}


  
    }

    public function EditProducts($id) //Returns edit view with input data from database
	{
		 $Product = Products::find($id);
			$Categories = Category::all();
			$Image_Product = Image_Product::where('product_id',$id)->first();


		return view('Admin/Products.Products_edit', [
			'id' => $Product->id
			, 'cat' => $Product->category_ID
			, 'name' =>$Product->title
			, 'desc' =>$Product->description
			, 'price' =>$Product->price
			, 'image' => $Image_Product->image
		])->with('Categories',$Categories);
	}

	public function postEdit($id) // posts the data to databes and changes the image file on server
	{
		 $Product = Products::find($id);
		 $input = \Input::all();
		 $Image_Product = Image_Product::where('product_id',$id)->first();

		 $rules = array('name' => 'required|max:255'
			,'desc' => 'required|max:255'
			,'cat' => 'required|min:1'
			,'price' => 'required|numeric|regex:/^\d*(\.\d{2})?$/'
			,'image' => 'mimes:jpeg,bmp,png'
		);

		 $validator = \Validator::make($input, $rules);

		if ($validator->passes())
        {

	         $Product->title = $input['name'];
	         $Product->category_ID = $input['cat'];
	         $Product->price = $input['price'];
	         $Product->description = $input['desc'];
			 $Product->updated_at=time();
			 $Product->save();

			  if (\Input::hasFile('image'))
             {
             			$Upload=Image_Product::where('product_id', $id)->pluck('image');
						$file_path_conv=explode("/",$Upload); // converting url path to local path
						$path=implode("\\",$file_path_conv);
						$Fullpath= public_path()."\\".$path;


	    				if(\File::delete($Fullpath)) 
	    				{ //deleting file from server
						      $destinationPath = 'upload/products'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Product_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						  
						      $path = "upload/products/".$fileName;
						      
	                          $Image_Product->image=$path;
	                          $Image_Product->product_id=$Product->id;
	                          $Image_Product->save();
	                     }
			 }




			return \Redirect::to('admin/Products')->with('success', "Successfully Updated");
		}

		else
		{
			 return \Redirect::back()->withErrors($validator);

		}

	}





}