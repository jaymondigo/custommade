<?php

class SessionController extends BaseController {

	public function getLogin()
	{	if (Auth::check())
			return Redirect::to('/member');
		else
			return View::make('public.login');
	}
	public function postLogin()
	{
		$user = array(
			'email' => Input::get('username'),
			'password' => Input::get('password')
		);

		$remember = Input::has('remember');
		if(Auth::attempt( $user, $remember ))
		{
			return Redirect::intended('/member');
		}
		else
		{
			$user = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			);

			if(Auth::attempt( $user, $remember ))
				return Redirect::intended('/member');
			else
				return View::make('public.login')->with('error', true);
		} 
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function getSignup(){
		return View::make('public.register')->with('errors');
	}

	public function postSignup(){
		

		$user = new  User();
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');
		$user->password = Input::get('password');
		$user->is_buyer = true;

		$matches = explode("@", $user->email);
		$user->username = $matches[0];

		if($user->save())
		{
			// if(Input::get('newsletter-subscribe'))
			// {
			// 	// $subs = new Subscriber;
			// 	// $subs->user_id = $user->id;
			// 	// $subs->save();
			// }
			Auth::login($user);
			return Redirect::to('/member');
		}
		else
		{
			return View::make('public.register')->with('errors', $user->validationErrors);;
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

	        // $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
	        // echo $message. "<br/>";
	        $id = $result['id'];
	        $first_name = $result['first_name'];
	        $last_name = $result['last_name'];
	        $site = 'fb';
	        $data = $result;
	        $email = $result['email'];

		    self::socialMediaLogin($email, $first_name, $last_name, $id, $site, $data);
		    //Var_dump
	        //display whole array().
	       // dd($result);

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

	public static function socialMediaLogin($email, $first_name, $last_name, $id, $site, $data){
		
		if($site=='fb'){
			$user = User::where('fb_id','=',$id)->limit(1)->get();

		}else if($site=='google'){
			$user = User::where('google_id','=',$id)->limit(1)->get();
		}



		if(isset($user[0]))
			$user = $user[0]; 
		else{			
			$user = User::where('email','=', $email)->limit(1)->get();

			if(!isset($user[0])){
				$user = new User();
			}else
				$user = $user[0];
		}

		if($site=='fb')
			$user->fb_id = $id;
		else if($site=='google')
			$user->google_id = $id;

		$user->first_name = $first_name;
		$user->last_name = $last_name;
		$user->email = $email;
		$user->password = time();
		$user->is_buyer = true;

		$matches = explode("@", $user->email);
		$user->username = $matches[0];

		if($user->save())
		{
			echo "new user";
	        
			Auth::login($user);
			echo Redirect::to('/member');
		}else{ 

			$user->updateUniques();
			Auth::login($user);
			echo Redirect::to('/member');
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