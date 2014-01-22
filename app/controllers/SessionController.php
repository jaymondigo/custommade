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
}