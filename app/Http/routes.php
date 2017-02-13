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

Route::get('/lieu/index/{category?}', 'LieuHourController@index' );
Route::get('/lieu/create', 'LieuHourController@create');
Route::post('/lieu/create', 'LieuHourController@store');
Route::get('/lieu/view/{LieuHour}', 'LieuHourController@show' );
Route::get('/lieu/edit/{LieuHour}', 'LieuHourController@edit');
Route::post('/lieu/update', 'LieuHourController@update');
// need destroy routes

// LieuHour Admin Routes

Route::get('admin/lieu/index/{category?}', 'LieuHourController@adminIndex' );
Route::get('admin/lieu/create', 'LieuHourController@adminCreate');
Route::post('admin/lieu/create', 'LieuHourController@adminStore');
Route::get('admin/lieu/view/{lieuHour}', 'LieuHourController@adminShow' );
Route::get('admin/lieu/edit/{lieuHour}', 'LieuHourController@adminEdit');
Route::post('admin/lieu/update', 'LieuHourController@handleAdminUpdate');
// need destroy routes

// SickDay Routes

Route::get('/sick/index/{category?}', 'SickDayController@index' );
Route::get('/sick/create', 'SickDayController@create');
Route::post('/sick/create', 'SickDayController@store');
Route::get('/sick/view/{SickDay}', 'SickDayController@show' );
Route::get('/sick/edit/{SickDay}', 'SickDayController@edit');
Route::post('/sick/update', 'SickDayController@update');
// need destroy routes

// SickDay Admin Routes

Route::get('admin/sick/index/{category?}', 'SickDayController@adminIndex' );
Route::get('admin/sick/create', 'SickDayController@adminCreate');
Route::post('admin/sick/create', 'SickDayController@adminStore');
Route::get('admin/sick/view/{SickDay}', 'SickDayController@adminShow' );
Route::get('admin/sick/edit/{SickDay}', 'SickDayController@adminEdit');
Route::post('admin/sick/update', 'SickDayController@handleAdminUpdate');
// need destroy routes

// FreeTime Routes

Route::get('/freetime/index/{category?}', 'FreeTimeController@index' );
Route::get('/freetime/create', 'FreeTimeController@create');
Route::post('/freetime/create', 'FreeTimeController@store');
Route::get('/freetime/view/{FreeTime}', 'FreeTimeController@show' );
Route::get('/freetime/edit/{FreeTime}', 'FreeTimeController@edit');
Route::post('/freetime/update', 'FreeTimeController@update');
// need destroy routes

// FreeTime Admin Routes

Route::get('admin/freetime3/index/{category?}', 'FreeTimeController@adminIndex' );
Route::get('admin/freetime3/create', 'FreeTimeController@adminCreate');
Route::post('admin/freetime3/create', 'FreeTimeController@adminStore');
Route::get('admin/freetime3/view/{FreeTime}', 'FreeTimeController@adminShow' );
Route::get('admin/freetime3/edit/{FreeTime}', 'FreeTimeController@adminEdit');
Route::post('admin/freetime3/update', 'FreeTimeController@handleAdminUpdate');
// need destroy routes