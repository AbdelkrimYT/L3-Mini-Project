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
})->name('welcome');

Route::get('/vail', function() {
    return view('layouts.user');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'SuperadminController@showUsers')->name('superadmin.users');
Route::get('/users/{id}/edit', 'SuperadminController@edit')->name('superadmin.user.edit');
Route::put('/users/{id}', 'SuperadminController@__update')->name('superadmin.user.update');
Route::get('users/{id}', 'SuperadminController@showUser')->name('superadmin.user.show');
Route::delete('/destroy/{id}', 'SuperadminController@__destroy')->name('superadmin.user.destroy');

Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
//Route::resource('admin', 'AdminController');

Route::get('/home', 'UserController@index')->name('user');
Route::get('/profile', 'UserController@show')->name('user.profile');
Route::put('/profile', 'UserController@update')->name('user.update');
Route::delete('/destroy', 'UserController@destroy')->name('user.destroy');
Route::get('/search', 'UserController@search')->name('user.search');
Route::post('/search', 'UserController@search')->name('user.search.post');
Route::get('/home/{id}/buying', 'UserController@show_buying_form')->name('user.show.buying');
Route::post('/home/buying', 'UserController@buying')->name('user.buying');

Route::resources([
    'airplane_models' => 'AirplaneModelController',
    'airplanes' => 'AirplaneController',
    'prices' => 'PriceController',
    'airports' => 'AirportController',
    'flights' => 'FlightController',
    'tickets' => 'TicketController'
]);
