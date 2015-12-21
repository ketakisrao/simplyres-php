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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('bookings', 'HomeController@bookings');

Route::post('delbook', function(){
    if(Request::ajax()){
        $id = HomeController::delbooking(3);
        /*if($id==3)
            return Response::json(Request::all());
        else*/
        return "Sadness! :(" . $id;
    }
});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);