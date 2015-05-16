<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;
use App\Image_Product;

class ProductsController extends Controller{

  public function showProducts()
   {

   	$Products = Products::Latest()->paginate(5);

   	return view('Admin/Products.Products')->with('Products', $Products);

  	}

   public function AddProducts()
   {

   	$Categories = Category::all();
   	return view('Admin/Products.Products_add')->with('Categories', $Categories);
   }

  	public function postProducts()
   	{

   		$input = \Input::all();
		$rules = array('name' => 'required'
			,'desc' => 'required'
			,'cat' => 'required|min:1'
			,'price' => 'required|numeric|regex:/^\d*(\.\d{2})?$/'
			,'image' => 'required|mimes:jpeg,bmp,png'
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
						      $destinationPath = 'upload'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Product_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						      // sending back with message
						      \Session::flash('success', 'Upload successfully');

						      $path = "upload/".$fileName;

	                          $Image_Product = new Image_Product();
	                          $Image_Product->image =$path;
	                          $Image_Product->product_id = $Product->id;
	                          $Image_Product->save();
						}


                          return \Redirect::to('/admin/Products');
     
                } else {
                        return \Redirect::to('/admin/Products/add')->withErrors($validator);
                }
		}

	public function DeleteProducts($id)

   	{			
   			$Product = Products::find($id);

   			$Product->orderitem()->delete();


		if ($Product->delete())
		{
			   return \Redirect::to('/admin/Products')->with('success', "Prece veiksmīgi izdzēsta!");
		}
			else
			{
				   return \Redirect::to('/admin/Products')->with('fail', "An error occured while deleting the Product.");
			}


  
    }

    public function EditProducts($id)
	{
		 $Product = Products::find($id);
			$Categories = Category::all();


		return view('Admin/Products.Products_edit', [
			'id' => $Product->id
			, 'cat' => $Product->category_ID
			, 'name' =>$Product->title
			, 'desc' =>$Product->description
			, 'price' =>$Product->price
		])->with('Categories',$Categories);
	}

	public function postEdit($id)
	{
		 $Product = Products::find($id);
		 $input = \Input::all();

		 $rules = array('name' => 'required'
			,'desc' => 'required'
			,'cat' => 'required|min:1'
			,'price' => 'required|numeric|regex:/^\d*(\.\d{2})?$/'
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



		return \Redirect::to('admin/Products')->with('success', "Kategorija veiksmīgi izmainīta");
		}

		else
		{
			 return \Redirect::back()->withErrors($validator);

		}

	}





}