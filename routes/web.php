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

Route::get('/', 'HomeController@index')->name('home');


// Route::get('/comics', 'ComicController@index')->name('comics.index');
// Route::get('/comics/{comic}', 'ComicController@index')->name('comics.show');

// # CRUD routes
Route::resource('comics', 'ComicController');