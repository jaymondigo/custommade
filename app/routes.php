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

Route::get('/', array('as'=>'home', 'uses'=>'HomeController@getIndex'));
Route::get('login', array('as'=>'login_route', 'uses'=>'SessionController@getlogin'));
Route::get('member', array('as'=>'member', 'uses'=>'DashboardController@getMember'));

Route::controller('session', 'SessionController');
Route::controller('register', 'RegisterController');
Route::controller('home', 'HomeController');    
/* start apps routes =============================================== */

Route::group(array('before' => 'auth'), function(){   
		Route::controller('app', 'DashboardController');    
		Route::controller('user', 'UserController');

});

/*end apps routes====================================================*/
 
