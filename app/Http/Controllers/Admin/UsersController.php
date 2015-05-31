<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;
use App\Order;

class UsersController extends Controller{

	/*
	|--------------------------------------------------------------------------
	| Users Controller
	|--------------------------------------------------------------------------
	|
	|This controller is responsible for all user CRUD funcionality 
	*/	

  public function showUsers()//shows all users in database
   {

   	$User = User::Latest()->paginate(25);

   	return view('Admin/Users.Users')->with('User', $User);

  	}

   public function AddUser() // gets administration a new user add form
   {

   	return view('Admin/Users.Users_add');
   }

  	public function postUser()// posts the new data to database
   	{

   		$input = \Input::all();
		$rules = array('email' => 'required|email|max:255|unique:users',
			'name' => 'required|max:255',
			'password' => 'required|min:6',
			'password_confirmation' => 'required|same:password',
			'isAdmin' => 'required|numeric|min:0',


			);

					$password = $input['password'];
				$password = \Hash::make($password);

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {
                        $User = new User();
                        $User->name = $input['name'];
                        $User->email = $input['email'];
                        $User->isAdmin = $input['isAdmin'];
                        $User->password = $password;
                        $User->save();

                          return \Redirect::to('/admin/Users')->with('success', "successfully added!");
     
                } else {
                        return \Redirect::to('/admin/Users/add')->withErrors($validator);
                }
		}

	public function DeleteUser($id)// deletes the given user

   	{			
   			$User = User::find($id);

   			foreach ($User->order as $key => $Order) {
   				$Order->orderitem()->delete();
   			}

   			$User->order()->delete();


		if ($User->delete())
		{
			    return \Redirect::to('/admin/Users')->with('success', "successfully Deleted");
		}
			else

			{
				   return \Redirect::to('/admin/Users')->with('fail', "An error occured while deleting .");
			}


  
    }

    public function EditUser($id) //gets edit form for editing user privilages
	{
		 $User = User::find($id);


		return view('Admin/Users.Users_edit', [
			'isAdmin' =>$User->isAdmin
		])->with('User',$User);
	}

	public function postEdit($id)// post the edit  form
	{
		 $User = User::find($id);
		 $input = \Input::all();

		$rules = array(
			'isAdmin' => 'required|numeric|min:0',
			);

		 $validator = \Validator::make($input, $rules);

		if ($validator->passes())
        {

         $User->isAdmin = $input['isAdmin'];
		 $User->updated_at=time();
		 $User->save();



		return \Redirect::to('/admin/Users')->with('success', "Successfully Updated");
		}

		else
		{
			 return \Redirect::back()->withErrors($validator);

		}

	}





}