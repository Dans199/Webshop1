<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Special;
use App\images_Specials;
use App\Http\Requests\Special as SpecialRequest;
use Carbon\Carbon;
use DB;


class SpecialsController extends Controller{

	/*
	|--------------------------------------------------------------------------
	| Specials Controller
	|--------------------------------------------------------------------------
	|
	|This controller is responsible for all specials CRUD funcionality 
	*/	

  public function showSpecials() // gets the special list from database
   {

   	$Specials = Special::Latest()->paginate(5);

   	return view('Admin/Specials.Specials')->with('Specials', $Specials);

  	}

   public function AddSpecials() //returns form for adding new special
   {
   	return view('Admin/Specials.Specials_add');
   }

  	public function postSpecials() //post the data to databes and server
   	{

   		$input = \Input::all();
		$rules = array('name' => 'required|max:80'
			,'end_time' => 'required|date'
			,'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg'
			);

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {
                        $Special = new Special();
                        $Special->name = $input['name'];
                        $Special->end_time =$input['end_time'];
                        $Special->save();

                        if (\Input::file('image')->isValid())
                        {
						      $destinationPath = 'upload/Special'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Special_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						      // sending back with message
						      \Session::flash('success', 'Upload successfully');

						      $path = "upload/Special/".$fileName;

	                          $Image_Specials = new images_Specials();
	                          $Image_Specials->image =$path;
	                          $Image_Specials->special_id = $Special->id;
	                          $Image_Specials->save();
						}


                          return \Redirect::to('/admin/specials')->with('success', "successfully added!");
     
                } else {
                        return \Redirect::back()->withErrors($validator);
                }
		}

	public function DeleteSpecials($id) //deletes the special and image

   	{			
   			$Specials = Special::find($id);

   			$Upload=images_Specials::where('special_id', $id)->pluck('image');
			$file_path_conv=explode("/",$Upload); // converting url path to local path
			$path=implode("\\",$file_path_conv);
			$Fullpath= public_path()."\\".$path;


		    if(\File::delete($Fullpath))
		    { 
		    	$Specials->imageSpecials()->delete();
				if ($Specials->delete())
				{
					   return \Redirect::back()->with('success', "successfully Deleted");
				}
			}
			else
			{
				   return \Redirect::to('/admin/specials')->with('fail', "An error occured while deleting.");
			}


  
    }

    public function EditSpecials($id) //edits the special
	{
		$Specials = Special::find($id);
		$images_Specials = images_Specials::where('special_id',$id)->first();




		return view('Admin/Specials.Specials_edit', [
			'id' => $Specials->id
			, 'name' =>$Specials->name
			, 'end_time' =>$Specials->end_time->format('Y-m-d')
			, 'image' => $images_Specials->image
		])->with('Specials',$Specials);
	}

	public function postEditSpecials($id) // posts the special to database
	{
	    $Specials = Special::find($id);
		$images_Specials = images_Specials::where('special_id',$id)->first();
 
		 $input = \Input::all();
	
		 $rules = array('name' => 'required'
			,'end_time' => 'required|date'
			,'image' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg'
		);

		 $validator = \Validator::make($input, $rules);

		if ($validator->passes())
        {

 			 $Specials->name = $input['name'];
             $Specials->end_time =$input['end_time'];
			 $Specials->updated_at=time();
			 $Specials->save();

			 if (\Input::hasFile('image'))
             {
						    $Upload=images_Specials::where('special_id', $id)->pluck('image');
							$file_path_conv=explode("/",$Upload); // converting url path to local path
							$path=implode("\\",$file_path_conv);
							$Fullpath= public_path()."\\".$path;

						    if(\File::delete($Fullpath))
						    {
						     $destinationPath = 'upload/Special'; // upload path
						      $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
						      $fileName ='Special_'.rand(11111,99999).'.'.$extension; // renameing image
						      \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
						      // sending back with message
						      \Session::flash('success', 'Upload successfully');

						      $path = "upload/Special/".$fileName;

   							  $images_Specials->image =$path;
	                          $images_Specials->save();

							 }
			}

                return \Redirect::to('/admin/specials')->with('success', "Successfully Updated");
     
                } else {
                        return \Redirect::back()->withErrors($validator);
                
            }

	}





}