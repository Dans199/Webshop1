<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa;
use App\Category ;
use App\Products ;
use App\Image_Category;

class CategoryController extends Controller{

		/*
	|--------------------------------------------------------------------------
	| Category Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for categories CRUD funcionality 
	*/

  public function showCategory()// returns all categories
   {

   	$Categorys = Category::Latest()->paginate(5);

   	return view('Admin/Category.Category')->with('Categorys',$Categorys);

  	}

   public function AddCategory() //returns add new category form for categories
   	{
   			$groups = Grupa::all();

   	return view('Admin/Category.Category_add')->with('groups', $groups);

  	}

  	public function postCategory()// posts the new category to database and saves image files to server
   	{

   		$input = \Input::all();
		$rules = array('name' => 'required|max:255',
			'desc' => 'required|max:255',
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

                          return \Redirect::to('/admin/Categories')->with('success', "successfully added!");
     
                } else {
                        return \Redirect::to('/admin/Categories/add')->withErrors($validator);
                }
		}

	public function DeleteCategory($id) //deletes the category and image file on server

   	{			
	   		$category = Category::find($id);

			foreach ($category->products as $product){

			$product->orderitem()->delete();
			$product->imageProduct()->delete();

			}

	    	$category->products()->delete();

	    	$Upload=Image_Category::where('category_id', $id)->pluck('image');
			$file_path_conv=explode("/",$Upload); // converting url path to local path
			$path=implode("\\",$file_path_conv);
			$Fullpath= public_path()."\\".$path;


		    if(\File::delete($Fullpath))
		    { 
				$category->imageCategory()->delete();


				if ($category->delete())
				{
					   return \Redirect::back()->with('success', "successfully Deleted");
				}
			}
			else
			{
				return \Redirect::to('/admin/Categories')->with('fail', "An error occured while deleting.");
			}


  
    }

    public function EditCategory($id)//returns the  edit view for specifice category
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

	public function postEdit($id) // posts the edited data to database
	{
		 $Category= Category::find($id);
		 $Image_Category = Image_Category::where('category_id',$id)->first();

		 $input = \Input::all();
		 $rules = array('name' => 'required|max:255','desc' => 'required|max:255','image' => 'image');

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
						    $Upload=Image_Category::where('category_id', $id)->pluck('image');
							$file_path_conv=explode("/",$Upload); // converting url path to local path
							$path=implode("\\",$file_path_conv);
							$Fullpath= public_path()."\\".$path;

						    if(\File::delete($Fullpath))
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
			 }

			return \Redirect::to('/admin/Categories')->with('success', "Successfully Updated");
		}

		else
		{
			 return \Redirect::back()->withErrors($validator);

		}

	}





}