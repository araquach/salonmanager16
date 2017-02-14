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
Route::get('/holiday/{holiday}/edit', 'HolidayController@edit');
Route::put('/holiday/{holiday}', 'HolidayController@update');

// need destroy routes

// Holiday Admin Routes

Route::get('admin/holiday/index/{category?}', 'HolidayController@adminIndex' );
Route::get('admin/holiday/create', 'HolidayController@adminCreate');
Route::post('admin/holiday/create', 'HolidayController@adminStore');
Route::get('admin/holiday/view/{holiday}', 'HolidayController@adminShow' );
Route::get('admin/holiday/{holiday}/edit', 'HolidayController@adminEdit');
Route::put('admin/holiday/{holiday}', 'HolidayController@adminUpdate');
// need destroy routes

// LieuHour Routes

Route::get('/lieu/index/{category?}', 'LieuHourController@index' );
Route::get('/lieu/create', 'LieuHourController@create');
Route::post('/lieu/create', 'LieuHourController@store');
Route::get('/lieu/view/{lieuHour}', 'LieuHourController@show' );
Route::get('/lieu/{lieuHour}/edit', 'LieuHourController@edit');
Route::put('/lieu/{lieuHour}', 'LieuHourController@update');
// need destroy routes

// LieuHour Admin Routes

Route::get('admin/lieu/index/{category?}', 'LieuHourController@adminIndex' );
Route::get('admin/lieu/create', 'LieuHourController@adminCreate');
Route::post('admin/lieu/create', 'LieuHourController@adminStore');
Route::get('admin/lieu/view/{lieuHour}', 'LieuHourController@adminShow' );
Route::get('admin/lieu/{lieuHour}/edit', 'LieuHourController@adminEdit');
Route::put('admin/lieu/{lieuHour}', 'LieuHourController@adminUpdate');
// need destroy routes

// SickDay Routes

Route::get('/sick/index/{category?}', 'SickDayController@index' );
Route::get('/sick/view/{sickDay}', 'SickDayController@show' );
// need destroy routes

// SickDay Admin Routes

Route::get('admin/sick/index/{category?}', 'SickDayController@adminIndex' );
Route::get('admin/sick/create', 'SickDayController@adminCreate');
Route::post('admin/sick/create', 'SickDayController@adminStore');
Route::get('admin/sick/view/{sickDay}', 'SickDayController@adminShow' );
Route::get('admin/sick/{sickDay}/edit', 'SickDayController@adminEdit');
Route::put('admin/sick/{sickDay}', 'SickDayController@adminUpdate');
// need destroy routes

// FreeTime Routes

Route::get('/freetime/index/{category?}', 'FreeTimeController@index' );
Route::get('/freetime/create', 'FreeTimeController@create');
Route::post('/freetime/create', 'FreeTimeController@store');
Route::get('/freetime/view/{freeTime}', 'FreeTimeController@show' );
Route::get('/freetime/{freeTime}/edit', 'FreeTimeController@edit');
Route::put('/freetime/{freeTime}', 'FreeTimeController@update');
// need destroy routes

// FreeTime Admin Routes

Route::get('admin/freetime/index/{category?}', 'FreeTimeController@adminIndex' );
Route::get('admin/freetime/create', 'FreeTimeController@adminCreate');
Route::post('admin/freetime/create', 'FreeTimeController@adminStore');
Route::get('admin/freetime/view/{freeTime}', 'FreeTimeController@adminShow' );
Route::get('admin/freetime/{freeTime}/edit', 'FreeTimeController@adminEdit');
Route::put('admin/freetime/update', 'FreeTimeController@adminUpdate');
// need destroy routes