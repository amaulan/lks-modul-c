<?php

Route::get('/', 'DashboardController@index');

Auth::routes();
Route::post('login', 	'LoginController@login')->name('login');
Route::post('register', 'RegisterController@register')->name('register');
Route::get('logout',function(){
	\Session::forget('credential');
	return \Redirect::to('home');
});

Route::get('/home', 'DashboardController@index');

Route::group(['prefix' => 'user'], function()
{
	Route::get('/', 	'DashboardController@index');
	Route::group(['prefix' => 'lomba'], function()
	{
		Route::get('/' , 					'User\BidangLombaController@index');
		Route::get('/daftar/{id}' , 	'User\BidangLombaController@daftar');
		Route::get('/batal/{id}', 	'User\BidangLombaController@batal');
	});
});


Route::group(['prefix' => 'admin'], function()
{
	Route::get('/',     'DashboardController@index');
	Route::group(['prefix' => 'lomba'], function()
	{
		Route::get('/', 			'Admin\BidangLombaController@index');
		Route::post('/create', 		'Admin\BidangLombaController@create');
		Route::post('/update', 		'Admin\BidangLombaController@update');
		Route::get('/delete/{id}', 		'Admin\BidangLombaController@delete');
	});

	Route::group(['prefix' => 'kontingen'], function()
	{
		Route::get('/', 			'Admin\KontingenController@index');
		Route::post('/create', 		'Admin\KontingenController@create');
		Route::post('/update', 	'Admin\KontingenController@update');
		Route::get('/delete/{id}', 		'Admin\KontingenController@delete');
	});

	Route::group(['prefix' => 'registrasi'], function()
	{
		Route::get('/', 			'Admin\Registrasi@index');
		Route::post('/create', 		'Admin\Registrasi@create');
		Route::get('/delete/{id}',  'Admin\Registrasi@delete');
	});

	Route::group(['prefix' => 'penilaian'], function(){
		Route::get('/', 			'Admin\PenilaianController@index');
		Route::post('/update', 		'Admin\PenilaianController@update');
	});


});