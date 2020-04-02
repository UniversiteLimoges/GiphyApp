<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
	->middleware('geoip')
	->name('home');
Route::get('/userslist', 'UserController@index')->name('userslist');

// Tags
Route::get('/tagslist', 'TagController@getTags')->name('tagslist');

// Location
Route::get('/getlocation', 'LocationController@getUserLocation')->name('getlocation');


// Test
Route::get('/test', 'TestController@geoip');