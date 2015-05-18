<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa;
use App\Category ;
use App\Products ;
use App\Image_Category;

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
		$rules = array('name' => 'required',
			'desc' => 'required',
			'group' => 'required|min:1',
			'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg');

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {
                        $Category = new Category();
                        $Category->name = $input['name'];
                        $Category->grupas_ID = $input['group'];
                        $Category->desc = $input['desc'];
                        $Category->save();



                        if (\Input::file('image')->isValid())
                        {
						      $destinationPath = 'upload/category'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Category_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						      // sending back with message
						      \Session::flash('success', 'Upload successfully');

						      $path = "upload/category/".$fileName;

	                          $Image_Category = new Image_Category();
	                          $Image_Category->image =$path;
	                          $Image_Category->category_id =$Category->id;
	                          $Image_Category->save();
						}

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
		$product->imageProduct()->delete();

		}

    $category->products()->delete();
	$category->imageCategory()->delete();


		if ($category->delete())
		{
			   return \Redirect::back()->with('success', "Kategorija veiksmīgi izdzēsta!");
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
		 $Image_Category = Image_Category::where('category_id',$id)->first();


		return view('Admin/Category.Category_edit', [
			'id' => $Category->id
			, 'group' => $Category->grupas_ID
			, 'name' => $Category->name
			, 'desc' => $Category->desc
			, 'image' => $Image_Category->image
		])->with('groups',$groups);
	}

	public function postEdit($id)
	{
		 $Category= Category::find($id);
		 $Image_Category = Image_Category::where('category_id',$id)->first();

		 $input = \Input::all();
		 $rules = array('name' => 'required','desc' => 'required','image' => 'image');

		 $validator = \Validator::make($input, $rules);

		if ($validator->passes())
        {


			 $Category->name=$input['name'];
			 $Category->desc=$input['desc'];
			 $Category->grupas_ID=$input['group'];
			 $Category->updated_at=time();
			 $Category->save();

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
	                          $Image_Category->category_id=$Category->id;
	                          $Image_Category->save();
			 }





			return \Redirect::to('/admin/Categories')->with('success', "Kategorija veiksmīgi izmainīta");
		}

		else
		{
			 return \Redirect::back()->withErrors($validator);

		}

	}





}