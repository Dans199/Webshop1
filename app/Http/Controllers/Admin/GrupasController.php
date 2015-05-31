<?php namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;
use App\Image_Category;
use App\Image_groups ;
use App\Image_Product;


class GrupasController extends Controller{

			/*
	|--------------------------------------------------------------------------
	| Grupas Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for group CRUD funcionality 
	*/


  public function showGroups()//-Gets all groups from database and sends the user to group view
   {

   	$groups = Grupa::latest()->paginate(5);
   	return view('Admin/Group.Grupas')->with('groups', $groups);

  	}

   public function AddGroup()//-  Sends the user to form where user can add new group
   	{

   	return view('Admin/Group.Grupas_add');

  	}

  	public function postGroup()//- Posts the data to database and saves file to server
   	{

   

   		$input = \Input::all();
		$rules = array('Group_name' => 'required|max:255','Group_desc' => 'required|max:255', 'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg');
		$file = array('image' => \Input::file('image'));

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {
                        $group = new Grupa();
                        $group->Group_name = $input['Group_name'];
                        $group->Group_desc = $input['Group_desc'];
                        $group->save();

                        if (\Input::file('image')->isValid()) // file upload
                        {
						      $destinationPath = 'upload/group'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Group_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

						      $path = "upload/group/".$fileName;

	                          $Image_groups = new Image_groups();
	                          $Image_groups->image =$path;
	                          $Image_groups->grupas_ID = $group->id;
	                          $Image_groups->save();
						}

                          return \Redirect::to('/admin/groups')->with('success', "successfully added!");
     
                } else {
                        return \Redirect::to('/admin/groups/add')->withErrors($validator);
                }
		}

	public function DeleteGroup($id) //deletes the group from database and image file from server

   	{

	$group = Grupa::find($id);
	foreach ($group->category as $category)
	{

		foreach ($category->products as $product){

			$product->orderitem()->delete();
			$product->imageProduct()->delete();
			$product->delete();

		}

    $category->products()->delete();
    $category->imageCategory()->delete();

    $category->delete();
	}

	$Upload=Image_groups::where('grupas_ID', $id)->pluck('image');
	$file_path_conv=explode("/",$Upload); // converting url path to local path
	$path=implode("\\",$file_path_conv);
	$Fullpath= public_path()."\\".$path;


	    if(\File::delete($Fullpath)) { //deleting file from server
	      	
	  		$group->imagegroups()->delete();


			if ($group->delete())
			{
				   return \Redirect::back()->with('success', "successfully Deleted");
			}

	    }
		else
		{
			return \Redirect::to('/admin/groups')->with('fail', "An error occured while deleting the group.");
		}


  
    }

    public function getEdit($id)// returns view with input parameters from database to group edit page
	{
		 $group = Grupa::find($id);
		 $Image_groups = Image_groups::where('grupas_ID',$id)->first();


		return view('Admin/Group.Grupas_edit', [
			'id' => $group->id
			, 'Group_name' => $group->Group_name
			, 'Group_desc' => $group->Group_desc
			, 'image' => $Image_groups->image
		]);
	}

	public function postEdit($id) // post the new group data to  database
	{
		$group = Grupa::find($id);
		$Image_groups = Image_groups::where('grupas_ID',$id)->first();

		 $input = \Input::all();
		 $rules = array('Group_name' => 'required|max:255' ,'Group_desc' => 'required|max:255','image' => 'mimes:jpeg,bmp,png');

		 $validator = \Validator::make($input, $rules);

		  if ($validator->passes())
                {

		$group->update([
			'Group_name' => $input['Group_name']
			, 'Group_desc' => $input['Group_desc']
			, 'updated_at' => time()
		]);

		   if (\Input::hasFile('image'))// checks if file is provided
              {

                        	$Upload=Image_groups::where('grupas_ID', $id)->pluck('image');
							$file_path_conv=explode("/",$Upload); // converting url path to local path
							$path=implode("\\",$file_path_conv);
							$Fullpath= public_path()."\\".$path;

	    					if(\File::delete($Fullpath))
	    					 { //deleting old file from server

							      $destinationPath = 'upload/group'; // upload path
							      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
							      $fileName ='Group_'.rand(11111,99999).'.'.$extension; // renameing image
							      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						

							      $path = "upload/group/".$fileName;
							      
		                          $Image_groups->image =$path;  
		                          $Image_groups->grupas_ID = $group->id;
		                          $Image_groups->save(); //saves the  image  path and the groups id
	                      	}
				}
		return \Redirect::to('/admin/groups')->with('success', "Successfully Updated");
		}

		else
		{
			 return \Redirect::back()->withErrors($validator);

		}

	}
}