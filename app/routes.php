<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as'=>'public', 'uses'=>'PublicController@getIndex'));
Route::get('login', array('as'=>'login_route', 'uses'=>'SessionController@getlogin'));

Route::controller('session', 'SessionController'); 
Route::get('signup', array('as'=>'signupRoute', 'uses'=>'SessionController@getSignup'));
Route::controller('p', 'PublicController');    
/* start apps routes =============================================== */

Route::group(array('before' => 'auth'), function(){    
		Route::get('member', array('as'=>'member', 'uses'=>'DashboardController@getMember'));
		Route::get('member/{uri1}', array('as'=>'member', 'uses'=>'DashboardController@getMember'));
		Route::get('member/{uri1}/{uri2}', array('as'=>'member', 'uses'=>'DashboardController@getMember'));
		Route::get('member/{uri1}/{uri2}/{uri3}', array('as'=>'member', 'uses'=>'DashboardController@getMember'));
		Route::get('member/{uri1}/{uri2}/{uri3}/{uri4}', array('as'=>'member', 'uses'=>'DashboardController@getMember'));

		Route::post('project/photo', array('uses'=>'ProjectController@photo'));
		Route::post('project/photo/delete', array('uses'=>'ProjectController@deletePhoto'));
		Route::resource('project', 'ProjectController');
});

Route::any('fb-login', array('as'=>'fb_login','uses'=>'SessionController@loginWithFacebook'));
Route::any('google-login', array('as'=>'fb_login','uses'=>'SessionController@loginWithGoogle'));
/*end apps routes====================================================*/
 
