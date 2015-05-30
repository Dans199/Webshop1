<?php namespace App\Services;

   use App\User;
   use Validator;
   use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
    use Mail;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
		
            //send verification mail to user

		Mail::send('emails.welcome', $data, function($message)
	{
	$message->to('dans.grinsteins@inbox.lv', 'swags')->subject('Welcome!');

	});


            return $user;
	}

}
