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

Route::post('delbook', 'HomeController@delbooking');

Route::post('addbooking', 'HomeController@addbooking');

Route::get('auth/twitter', 'Auth\AuthController@redirectToProvider');

Route::get('auth/twitter/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('api/bookings', 'HomeController@displayBookings');

Route::get('api/reservations', 'WelcomeController@displayBookings');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);