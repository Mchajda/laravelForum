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

Route::get('/home', 'PagesController@index')->name('home');

Route::resource('posts', 'PostsController');
Route::post('/create', 'PostsController@store')->name('savePost');
Route::get('/delete/{id}', 'PostsController@delete')->name('deletePost');
Route::get('/create/{id}', 'PostsController@create')->name('add');

Route::resource('room', 'RoomsController');
Route::get('/room/create', 'RoomsController@create');
Route::post('/room/create', 'RoomsController@store');

Route::get('/profile/{id}', 'ProfilesController@index');

