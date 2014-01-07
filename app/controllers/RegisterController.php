<?php

class RegisterController extends BaseController{

	

	public function getIndex(){
		return View::make('public.register')->with('err')->with('accountTypes',AccountType::all());
	}

	public function postSignup(){
		

		$user = new  User();
		$user->firstname = Input::get('first_name');
		$user->lastname = Input::get('last_name');
		$user->email = Input::get('email');
		$user->password = Input::get('password');
		$user->type = Input::get('account_type');

		if($user->save())
		{
			if(Input::get('newsletter-subscribe'))
			{
				// $subs = new Subscriber;
				// $subs->user_id = $user->id;
				// $subs->save();
			}
			Auth::login($user);
			return Redirect::to('/');
		}
		else
		{
			return View::make('public.register')->with('err', $user->validationErrors)->with('accountTypes',AccountType::all());;
		}
		
	}

	public function getForgotPassword() {
		return View::make('public.forgot_password');
	}

	public function postForgotPassword() {
		
		$email = Input::get('email');
		$user = User::where('email', $email)->first();

		if(is_object($user) && count($user) > 0) {
			
			$password = BRMHelper::genRandomPassword();
			$user->password = $password;
			$user->updateUniques();
			//send new password to user
			MailHelper::forgotPasswordMessage($user->email, $password);

			Session::flash('notice', 'Success! New password coming your way. Please check your email.');
			return View::make('public.forgot_password');

		}
		else{
			Session::flash('alert', 'Sorry, <strong>'.$email.'</strong> has no associated account yet.');
			return View::make('public.forgot_password');
		}

	}

	public function getTest()
	{
		$order = new Order;
		$order->dashboard_id = 123;
		$order->save();
		return print_r($order->validationErrors);
	}

	
}