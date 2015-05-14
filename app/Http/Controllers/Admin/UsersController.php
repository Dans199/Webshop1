<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;

class UsersController extends Controller{

  public function showUsers()
   {

   	$User = User::Latest()->paginate(25);

   	return view('Admin/Users.Users')->with('User', $User);

  	}

   public function AddUser()
   {

   	return view('Admin/Users.Users_add');
   }

  	public function postUser()
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

                          return \Redirect::to('/admin/Users');
     
                } else {
                        return \Redirect::to('/admin/Users/add')->withErrors($validator);
                }
		}

	public function DeleteUser($id)

   	{			
   			$User = User::find($id);

		if ($User->delete())
		{
			    return \Redirect::to('/admin/Users')->with('success', "Lietotājs veiksmīgi izdzēsta!");
		}
			else

			{
				   return \Redirect::to('/admin/Users')->with('fail', "An error occured while deleting the Product.");
			}


  
    }

    public function EditUser($id)
	{
		 $User = User::find($id);


		return view('Admin/Users.Users_edit', [
			'isAdmin' =>$User->isAdmin
		])->with('User',$User);
	}

	public function postEdit($id)
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



		return \Redirect::to('/admin/Users')->with('success', "Lietotājs veiksmīgi izmainīts");
		}

		else
		{
			 return \Redirect::back()->withErrors($validator);

		}

	}





}