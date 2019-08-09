<?php

Route::get('/', function () {
	 return redirect()->route('isp.index');
});
Route::get('/', 'HomeController@index')->name('isp.index');
Route::get('/admin', 'AdminController@index')->name('admin.index');

Auth::routes();
Route::get('/login', '\App\Http\Controllers\Auth\LoginController@index')->name('login.index');
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@verify');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout.index');

// Route::group(['middleware'=>['sess']], function(){

//});
