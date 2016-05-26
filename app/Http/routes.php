<?php

Route::get('/',[
	'as' 	=> 'tickets.latest',
	'uses'  => 'TicketsController@latest'
	]);

Route::get('/popular',[
	'as' 	=> 'tickets.popular',
	'uses'  => 'TicketsController@popular'
	]);

Route::get('/pendientes',[
	'as' 	=> 'tickets.open',
	'uses'  => 'TicketsController@open'
	]);

Route::get('/tutoriales',[
	'as' 	=> 'tickets.closed',
	'uses'  => 'TicketsController@closed'
	]);

Route::get('/solicitud/{id}',[
	'as' 	=> 'tickets.details',
	'uses'  => 'TicketsController@details'
	]);

Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');

Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::group(['middleware' => ['auth']], function () {

	Route::get('/solicitar', [
		'as' 	=> 'tickets.create',
		'uses' 	=> 'TicketsController@create'
		]);

});
