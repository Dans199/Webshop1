<?php namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;
use App\Image_groups ;

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
		$rules = array('Group_name' => 'required','Group_desc' => 'required', 'image' => 'required|mimes:jpeg,bmp,png');
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
						      $destinationPath = 'upload'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Group_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						      // sending back with message
						      \Session::flash('success', 'Upload successfully');

						      $path = "upload/".$fileName;

	                          $Image_groups = new Image_groups();
	                          $Image_groups->image =$path;
	                          $Image_groups->grupas_ID = $group->id;
	                          $Image_groups->save();
						}

                          return \Redirect::to('/admin/groups');
     
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

	}
    $category->products()->delete();
    $category->delete();
	}

	$Upload=Image_groups::where('grupas_ID', $id)->pluck('image');

	$path= public_path().$Upload;

	\File::delete($path);

	$group->imagegroups()->delete();


		if ($group->delete())
		{
			   return \Redirect::to('/admin/groups')->with('success', "Grupa veiksmīgi izdzēsta!");
		}
			else
			{
				   return \Redirect::to('/admin/groups')->with('fail', "An error occured while deleting the group.");
			}


  
    }

    public function getEdit($id)
	{
		 $group = Grupa::find($id);


		return view('Admin/Group.Grupas_edit', [
			'id' => $group->id
			, 'Group_name' => $group->Group_name
			, 'Group_desc' => $group->Group_desc
		]);
	}

	public function postEdit($id)
	{
		$group = Grupa::find($id);
		 $input = \Input::all();
		 $rules = array('Group_name' => 'required','Group_desc' => 'required');

		 $validator = \Validator::make($input, $rules);

		  if ($validator->passes())
                {

		$group->update([
			'Group_name' => $input['Group_name']
			, 'Group_desc' => $input['Group_desc']
			, 'updated_at' => time()
		]);
		return \Redirect::to('/admin/groups')->with('success', "Grupa veiksmīgi izmainīta");
		}

		else
		{
			 return \Redirect::back()->withErrors($validator);

		}

	}





}