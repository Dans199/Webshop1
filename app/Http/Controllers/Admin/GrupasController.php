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

  public function showGroups()
   {

   	$groups = Grupa::latest()->paginate(10);
   	return view('Admin/Group.Grupas')->with('groups', $groups);

  	}

   public function AddGroup()
   	{

   	return view('Admin/Group.Grupas_add');

  	}

  	public function postGroup()
   	{

   

   		$input = \Input::all();
		$rules = array('Group_name' => 'required','Group_desc' => 'required', 'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg');
		$file = array('image' => \Input::file('image'));

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {
                        $group = new Grupa();
                        $group->Group_name = $input['Group_name'];
                        $group->Group_desc = $input['Group_desc'];
                        $group->save();

                        if (\Input::file('image')->isValid())
                        {
						      $destinationPath = 'upload/group'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Group_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						      // sending back with message
						      \Session::flash('success', 'Upload successfully');

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

	public function DeleteGroup($id)

   	{

	$group = Grupa::find($id);
	foreach ($group->category as $category)
	{

	foreach ($category->products as $product){

		$product->orderitem()->delete();
		$product->imageProduct()->delete();

	}

    $category->products()->delete();
    $category->imageCategory()->delete();

    $category->delete();
	}

	$Upload=Image_groups::where('grupas_ID', $id)->pluck('image');

	$path= public_path().$Upload;

	\File::delete($path);

	$group->imagegroups()->delete();


		if ($group->delete())
		{
			   return \Redirect::back()->with('success', "successfully Deleted");
		}
			else
			{
				   return \Redirect::to('/admin/groups')->with('fail', "An error occured while deleting the group.");
			}


  
    }

    public function getEdit($id)
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

	public function postEdit($id)
	{
		$group = Grupa::find($id);
		$Image_groups = Image_groups::where('grupas_ID',$id)->first();

		 $input = \Input::all();
		 $rules = array('Group_name' => 'required','Group_desc' => 'required','image' => 'mimes:jpeg,bmp,png');

		 $validator = \Validator::make($input, $rules);

		  if ($validator->passes())
                {

		$group->update([
			'Group_name' => $input['Group_name']
			, 'Group_desc' => $input['Group_desc']
			, 'updated_at' => time()
		]);

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
	                          $Image_groups->grupas_ID = $group->id;
	                          $Image_groups->save();
						}
		return \Redirect::to('/admin/groups')->with('success', "Successfully Updated");
		}

		else
		{
			 return \Redirect::back()->withErrors($validator);

		}

	}





}