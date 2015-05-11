<?php namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;

class GrupasController extends Controller{

  public function showGroups()
   {

   	$groups = Grupa::latest()->paginate(5);
   	return view('Admin/Group.Grupas')->with('groups', $groups);

  	}

   public function AddGroup()
   	{

   	return view('Admin/Group.Grupas_add');

  	}

  	public function postGroup()
   	{

   		$input = \Input::all();
		$rules = array('Group_name' => 'required','Group_desc' => 'required');

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {
                        $group = new Grupa();
                        $group->Group_name = $input['Group_name'];
                        $group->Group_desc = $input['Group_desc'];
                        $group->save();

                          return \Redirect::to('/admin/groups');
     
                } else {
                        return \Redirect::to('/admin/groups/add')->withErrors($validator);
                }
		}

	public function DeleteGroup($id)

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