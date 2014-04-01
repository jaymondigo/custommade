<?php
/*
|--------------------------------------------------------------------------
| Confide Controller Template
|--------------------------------------------------------------------------
|
| This is the default Confide controller template for controlling user
| authentication. Feel free to change to your needs.
|
*/

class UserController extends BaseController {

    /**
     * Displays the form for account creation
     *
     */
    public function create()
    {
        return View::make(Config::get('confide::signup_form'))
        			->with('errors', true);
    }

    /**
     * Stores new account
     *
     */
    public function store()
    {    
        $user = new User;

        $user->firstname = Input::get('first_name');
        $user->lastname = Input::get('last_name');
        $user->email = Input::get( 'email' );
        $matches = explode("@", $user->email);
		$username = isset($matches[0]) ? $matches[0] : $user->firstname.'_'.$user->lastname;
        $username = preg_replace( "/[^0-9a-zA-Z-]/", '', $username);  
        $user->username = $username;
        $user->password = Input::get( 'password' );
        // $user->gender = Input::get( 'gender' );
        $user->is_buyer = true;

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = Input::get( 'confirm_password' );

        // Save if valid. Password field will be hashed before save
        $user->save();

        if ( $user->id ) {
            // Redirect with success message, You may replace "Lang::get(..." for your custom message.
                        return Redirect::action('UserController@login')
                            ->with( 'notice', Lang::get('confide::confide.alerts.account_created') ); 
        }
        else
        {   // Get validation errors (see Ardent package)
            $error = $user->errors()->all(':message');

            return Redirect::action('UserController@create')
                            ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
    }

    /**
     * Displays the login form
     *
     */
    public function login()
    {
        if( Confide::user() )
        {
            // If user is logged, redirect to internal 
            // page, change it to '/admin', '/dashboard' or something
            return Redirect::to('/member');
        }
        else
        {
            return View::make(Config::get('confide::login_form'));
        }
    }

    /**
     * Attempt to do login
     *
     */
    public function do_login()
    {
        $input = array(
            'email'    => Input::get( 'username' ), // May be the username too
            'username' => Input::get( 'username' ), // so we have to pass both
            'password' => Input::get( 'password' ),
            'remember' => Input::get( 'remember' ),
        );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        // Get the value from the config file instead of changing the controller
        if ( Confide::logAttempt( $input, Config::get('confide::signup_confirm') ) ) 
        {
            // Redirect the user to the URL they were trying to access before
            // caught by the authentication filter IE Redirect::guest('user/login').
            // Otherwise fallback to '/'
            // Fix pull #145
            return Redirect::intended('/member'); // change it to '/admin', '/dashboard' or something
        }
        else
        {
            $user = new User;

            // Check if there was too many login attempts
            if( Confide::isThrottled( $input ) )
            {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            }
            elseif( $user->checkUserExists( $input ) and ! $user->isConfirmed( $input ) )
            {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            }
            else
            {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }
             
            return Redirect::action('UserController@login')
                            ->withInput(Input::except('password'))
                            ->with( 'error', $err_msg );
        }
    }

    public function postUpdateInfo(){
        $user = User::find(Input::get('id'));
        if(!is_object($user))
            return Redirect::back();

        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->email = Input::get('email');
        $user->updateUniques();

        return $user->errors()->all(':message');
    }

    public function postUpdatePassword(){
        $user = Auth::user();
        if(!Hash::check(Input::get('old_password'), $user->password)) 
        {
            return Redirect::back()
                            ->with('password-error', 'Old password is invalid');
        }
        $user->password = Input::get('password');
        $user->password_confirmation = Input::get('password_confirmation');
        $user->updateUniques(); 
        if(count($user->errors()->all(':message'))>0)
            return Redirect::back()
                            ->with('password-error', $user->errors()->all(':message'));
        
        return Redirect::back()
                        ->with('password-success','Password successfully changed');
    }

    public function postUploadAvatar(){
        $user = User::find(Input::get('id'));
        if(!is_object($user))
            return Redirect::back();

        $user->avatar = Input::file('avatar');
        $user->updateUniques();

        return Redirect::back()
                        ->with('avatar_errors',$user->errors()->all(':message'));
    }
    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    public function confirm( $code )
    {
        if ( Confide::confirm( $code ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
                        return Redirect::action('UserController@login')
                            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
                        return Redirect::action('UserController@login')
                            ->with( 'error', $error_msg );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function forgot_password()
    {
        return View::make(Config::get('confide::forgot_password_form'));
    }

    /**
     * Attempt to send change password link to the given email
     *
     */
    public function do_forgot_password()
    {
        if( Confide::forgotPassword( Input::get( 'email' ) ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
                        return Redirect::action('UserController@login')
                            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
                        return Redirect::action('UserController@forgot_password')
                            ->withInput()
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function reset_password( $token )
    {
        return View::make(Config::get('confide::reset_password_form'))
                ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     */
    public function do_reset_password()
    {
        $input = array(
            'token'=>Input::get( 'token' ),
            'password'=>Input::get( 'password' ),
            'password_confirmation'=>Input::get( 'password_confirmation' ),
        );

        // By passing an array with the token, password and confirmation
        if( Confide::resetPassword( $input ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
                        return Redirect::action('UserController@login')
                            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
                        return Redirect::action('UserController@reset_password', array('token'=>$input['token']))
                            ->withInput()
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Log the user out of the application.
     *
     */
    public function logout()
    {
        Confide::logout();
        
        return Redirect::to('/');
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

    public function getMe(){
        return Auth::user();
    }
}
