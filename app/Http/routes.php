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

// Route::model('holiday', 'Holiday');
Route::get('/holiday/index/{category?}', 'HolidayController@index' );
Route::get('/holiday/create', 'HolidayController@create');
Route::post('/holiday/create', 'HolidayController@store');
Route::get('/holiday/view/{holiday}', 'HolidayController@view' );
Route::get('/holiday/edit/{holiday}', 'HolidayController@update');
Route::post('/holiday/update', 'HolidayController@update');



// Holiday Admin Routes

Route::get('admin/holiday/index', 'HolidayController@showAdminIndex' );
Route::get('admin/holiday/view/{holiday}', 'HolidayController@showAdminView' );
Route::get('admin/holiday/create', 'HolidayController@showAdminCreate');
Route::get('admin/holiday/update/{holiday}', 'HolidayController@showAdminUpdate');

// Holiday Admin Form Handlers

Route::post('admin/holiday/create', 'HolidayController@handleAdminCreate');
Route::post('admin/holiday/update', 'HolidayController@handleAdminUpdate');
