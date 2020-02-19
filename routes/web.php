<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users'], function() {
    Route::get('/','UserController@index');
    Route::get('/load-data-items','UserController@loadDataItems');
    Route::post('/store','UserController@store');
    Route::post('/edit','UserController@edit');
    Route::post('/update','UserController@update');
    Route::post('/delete','UserController@delete');

});
