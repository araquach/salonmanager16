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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Holiday Routes

Route::get('/holiday/index/{category?}', 'HolidayController@index' );
Route::get('/holiday/create', 'HolidayController@create');
Route::post('/holiday/create', 'HolidayController@store');
Route::get('/holiday/view/{holiday}', 'HolidayController@show' );
Route::get('/holiday/edit/{holiday}', 'HolidayController@edit');
Route::post('/holiday/update', 'HolidayController@update');
// need destroy routes

// Holiday Admin Routes

Route::get('admin/holiday/index/{category?}', 'HolidayController@adminIndex' );
Route::get('admin/holiday/create', 'HolidayController@adminCreate');
Route::post('admin/holiday/create', 'HolidayController@adminStore');
Route::get('admin/holiday/view/{holiday}', 'HolidayController@adminShow' );
Route::get('admin/holiday/edit/{holiday}', 'HolidayController@adminEdit');
Route::post('admin/holiday/update', 'HolidayController@handleAdminUpdate');
// need destroy routes