<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('test', 'UserController@test');
Route::get('/sms', function() {
    return view('sms');
});

Route::post('sms','UserController@sms');

Route::auth();

Route::get('/search',function(){
	return view('search');
});

Route::post('/search','HomeController@search');

Route::get('/searchbyid',function(){
	return view('searchbyid');
});

Route::post('/searchid','HomeController@searchById');
//Routes for registration
Route::group(['middleware' => 'auth'], function() {

Route::get('/verify','UserController@otp');

Route::get('/complete_profile_1',function(){
return view('auth.step1');
});

Route::get('/complete_profile_2',function(){
return view('auth.step2');
});

Route::get('/complete_profile_3',function(){
	return view('auth.step3');
});

Route::post('/verify','UserController@verifyMobile');
Route::post('/complete_profile_1','RegistrationController@step_one');
Route::post('/complete_profile_2','RegistrationController@step_two');
Route::post('/complete_profile_3','RegistrationController@step_three');

});


//Put routes for loggedin user here

Route::group(['middleware' => ['register','auth']], function() {
Route::get('/home', function(){
	return view('user.profile');
});
Route::get('/settings', function() {
    return view('user.settings');
});


Route::get('pic','UserController@pic');
Route::get('/notifications','UserController@notifications');
Route::get('/viewprofile/{slug}','UserController@viewprofile');
Route::get('/matchesverified','UserController@matches');
Route::get('/acceptances', 'UserController@acceptances');
Route::get('/receivedrequests','UserController@receivedrequests');
Route::get('/rejected','UserController@blockedrequest');

Route::post('/update','UserController@update');
Route::post('/upload_pic','UserController@upload_pic');
Route::post('/upload_family_pic','UserController@upload_family_pic');

//AJAX Request
Route::post('/sendrequest','UserController@sendrequest');
Route::post('/acceptrequest','UserController@acceptrequest');
Route::post('/rejectrequest','UserController@blockedrequest');
Route::post('/filter','UserController@filter');

});