<?php

class SessionController extends BaseController {

	public function getLogin()
	{
		return View::make('public.login');
	}
	public function postLogin()
	{
		$user = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);

		$remember = Input::has('remember');
		if(Auth::attempt( $user, $remember ))
		{
			return Redirect::intended('/');
		}
		else
		{
			return View::make('public.login')->with('error', true);
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function getSignup(){
		return View::make('public.register')->with('err');
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
			// if(Input::get('newsletter-subscribe'))
			// {
			// 	// $subs = new Subscriber;
			// 	// $subs->user_id = $user->id;
			// 	// $subs->save();
			// }
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

	/**
	 * Login user with facebook
	 *
	 * @return void
	 */

	public function loginWithFacebook() {

	   // get data from input
	    $code = Input::get( 'code' );

	    // get fb service
	    $fb = OAuth::consumer( 'Facebook' );
	    //$fb = OAuth::consumer('Facebook','http://url.to.redirect.to');
	    // check if code is valid
	    
	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from google, get the token
	        $token = $fb->requestAccessToken( $code );

	        // Send a request with it
	        $result = json_decode( $fb->request( '/me' ), true );

	        $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
	        echo $message. "<br/>";

	        //Var_dump
	        //display whole array().
	        dd($result);

	    }
	    // if not ask for permission first
	    else {  
	        // get fb authorization
	        $url = $fb->getAuthorizationUri(); 
	        // return to facebook login url
	        //return Response::make()->header( 'Location', (string)$url);
	        return Redirect::to(htmlspecialchars_decode($url));
	    }

	}

	public function loginWithGoogle() {

	    // get data from input
	    $code = Input::get( 'code' );

	    // get google service
	    $googleService = OAuth::consumer( 'Google' );

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from google, get the token
	        $token = $googleService->requestAccessToken( $code );

	        // Send a request with it
	        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

	        $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
	        echo $message. "<br/>";

	        //Var_dump
	        //display whole array().
	        dd($result);

	    }
	    // if not ask for permission first
	    else {
	        // get googleService authorization
	        $url = $googleService->getAuthorizationUri();

	        // return to facebook login url
	       	return Redirect::to(htmlspecialchars_decode($url));
	        // return Response::make()->header( 'Location: ', (string)$url );
	    }
	}

	public function postIsUnique(){
		$field = Input::get('field');
		$val = Input::get('value');

		$user = User::where($field,'=',$val)->limit(1)->get();
		if(!isset($user[0]))
			return array('isUnique'=> true);
		else
			return array('isUnique'=> false);
	}
}