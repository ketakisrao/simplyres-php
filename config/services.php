<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],
    
    'twitter' => [
    'client_id' => '9d97c5XLZULbJM8ZAqKqpeBH1',
    'client_secret' => 'IX7UE14q8NtFNLaztIimVfPyDtZve1Po7q6KrnDDN4AZe6mDEe',
    'redirect' => 'https://simplyresphp-ketakisrao.rhcloud.com/auth/twitter/callback',
 ],
    
];
