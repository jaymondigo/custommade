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

Route::get( 'user/register',               'UserController@create');
Route::post( 'user/is-unique',             'UserController@postIsUnique');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');

Route::controller('p', 'PublicController');    
Route::get('search/raw-data', array('as'=>'search','uses'=>'DashboardController@search'));

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
		Route::controller('user', 'UserController');
});

Route::any('fb-login', array('as'=>'fb_login','uses'=>'SessionController@loginWithFacebook'));
Route::any('google-login', array('as'=>'fb_login','uses'=>'SessionController@loginWithGoogle'));
/*end apps routes====================================================*/
 
