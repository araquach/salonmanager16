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

// LieuHour Routes

Route::get('/LieuHour/index/{category?}', 'LieuHourController@index' );
Route::get('/LieuHour/create', 'LieuHourController@create');
Route::post('/LieuHour/create', 'LieuHourController@store');
Route::get('/LieuHour/view/{LieuHour}', 'LieuHourController@show' );
Route::get('/LieuHour/edit/{LieuHour}', 'LieuHourController@edit');
Route::post('/LieuHour/update', 'LieuHourController@update');
// need destroy routes

// LieuHour Admin Routes

Route::get('admin/holiday/index/{category?}', 'HolidayController@adminIndex' );
Route::get('admin/holiday/create', 'HolidayController@adminCreate');
Route::post('admin/holiday/create', 'HolidayController@adminStore');
Route::get('admin/holiday/view/{holiday}', 'HolidayController@adminShow' );
Route::get('admin/holiday/edit/{holiday}', 'HolidayController@adminEdit');
Route::post('admin/holiday/update', 'HolidayController@handleAdminUpdate');
// need destroy routes

// SickDay Routes

Route::get('/SickDay/index/{category?}', 'SickDayController@index' );
Route::get('/SickDay/create', 'SickDayController@create');
Route::post('/SickDay/create', 'SickDayController@store');
Route::get('/SickDay/view/{SickDay}', 'SickDayController@show' );
Route::get('/SickDay/edit/{SickDay}', 'SickDayController@edit');
Route::post('/SickDay/update', 'SickDayController@update');
// need destroy routes

// SickDay Admin Routes

Route::get('admin/SickDay/index/{category?}', 'HolidayController@adminIndex' );
Route::get('admin/SickDay/create', 'SickDayController@adminCreate');
Route::post('admin/SickDay/create', 'SickDayController@adminStore');
Route::get('admin/SickDay/view/{SickDay}', 'SickDayController@adminShow' );
Route::get('admin/SickDay/edit/{SickDay}', 'SickDayController@adminEdit');
Route::post('admin/SickDay/update', 'SickDayController@handleAdminUpdate');
// need destroy routes

// FreeTime Routes

Route::get('/FreeTime/index/{category?}', 'FreeTimeController@index' );
Route::get('/FreeTime/create', 'FreeTimeController@create');
Route::post('/FreeTime/create', 'FreeTimeyController@store');
Route::get('/FreeTime/view/{FreeTime}', 'FreeTimeController@show' );
Route::get('/FreeTime/edit/{FreeTime}', 'FreeTimeController@edit');
Route::post('/FreeTime/update', 'FreeTimeController@update');
// need destroy routes

// FreeTime Admin Routes

Route::get('admin/FreeTime/index/{category?}', 'FreeTimeController@adminIndex' );
Route::get('admin/FreeTime/create', 'FreeTimeController@adminCreate');
Route::post('admin/FreeTime/create', 'FreeTimeController@adminStore');
Route::get('admin/FreeTime/view/{FreeTime}', 'FreeTimeController@adminShow' );
Route::get('admin/FreeTime/edit/{FreeTime}', 'FreeTimeController@adminEdit');
Route::post('admin/FreeTime/update', 'FreeTimeController@handleAdminUpdate');
// need destroy routes