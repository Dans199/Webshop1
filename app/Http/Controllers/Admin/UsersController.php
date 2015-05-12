<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;

class UsersController extends Controller{

  public function showUsers()
   {

   	$User = User::Latest()->paginate(50);

   	return view('Admin/Users.Users')->with('User', $User);

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

                          return \Redirect::to('/admin/Products');
     
                } else {
                        return \Redirect::to('/admin/Products/add')->withErrors($validator);
                }
		}

	public function DeleteProducts($id)

   	{			
   			$Product = Products::find($id);

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