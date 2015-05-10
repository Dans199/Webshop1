<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;

class ProductsController extends Controller{

  public function showProducts()
   {

   	$Products = Products::Latest()->paginate(10);

   	return view('Admin/Products.Products')->with('Products', $Products);

  	}

   public function AddProducts()
   {

   	$Category = Category::all();
   	return view('Admin/Category.Category_add')->with('Category', $Category);
   }

  	public function postProducts()
   	{

   		$input = \Input::all();
		$rules = array('name' => 'required','desc' => 'required','group' => 'required|min:1');

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {
                        $Category = new Category();
                        $Category->name = $input['name'];
                        $Category->grupas_ID = $input['group'];
                        $Category->desc = $input['desc'];
                        $Category->save();

                          return \Redirect::to('/admin/Categories');
     
                } else {
                        return \Redirect::to('/admin/Categories/add')->withErrors($validator);
                }
		}

	public function DeleteProducts($id)

   	{			
   		$group = Grupa::find($id);

	   $products = Grupa::find($id)->category()->products->delete();
	   $category= Grupa::find($id)->category->delete();


		if ($group->delete())
		{
			   return \Redirect::to('/admin/groups')->with('success', "Grupa veiksmīgi izdzēsta!");
		}
			else
			{
				   return \Redirect::to('/admin/groups')->with('fail', "An error occured while deleting the group.");
			}


  
    }

    public function EditProducts($id)
	{
		 $Category= Category::find($id);
		 $groups = Grupa::all();


		return view('Admin/Category.Category_edit', [
			'id' => $Category->id
			, 'group' => $Category->grupas_ID
			, 'name' => $Category->name
			, 'desc' => $Category->desc
		])->with('groups',$groups);
	}

	public function postEdit($id)
	{
		 $Category= Category::find($id);
		 $input = \Input::all();
		 $rules = array('name' => 'required','desc' => 'required','group' => 'required|min:1');

		 $validator = \Validator::make($input, $rules);

		if ($validator->passes())
        {


		 $Category->name=$input['name'];
		 $Category->desc=$input['desc'];
		 $Category->grupas_ID=$input['group'];
		 $Category->updated_at=time();
		 $Category->save();



		return \Redirect::to('/admin/Categories')->with('success', "Kategorija veiksmīgi izmainīta");
		}

		else
		{
			 return \Redirect::back()->withErrors($validator);

		}

	}





}