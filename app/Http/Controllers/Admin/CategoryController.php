<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;

class CategoryController extends Controller{

  public function showCategory()
   {

   	$Categorys = Category::Latest()->paginate(5);

   	return view('Admin/Category.Category')->with('Categorys',$Categorys);

  	}

   public function AddCategory()
   	{
   			$groups = Grupa::all();

   	return view('Admin/Category.Category_add')->with('groups', $groups);

  	}

  	public function postCategory()
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

	public function DeleteCategory($id)

   	{			
   		$category = Category::find($id);

		foreach ($category->products as $product){

		$product->orderitem()->delete();

		}

    $category->products()->delete();


		if ($category->delete())
		{
			   return \Redirect::to('/admin/Categories')->with('success', "Kategorija veiksmīgi izdzēsta!");
		}
			else
			{
				   return \Redirect::to('/admin/Categories')->with('fail', "An error occured while deleting the group.");
			}


  
    }

    public function EditCategory($id)
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