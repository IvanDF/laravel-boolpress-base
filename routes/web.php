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

// Homepage
Route::get('/', 'StaticPageController@home')->name('home');

// About
Route::get('/about', 'StaticPageController@about')->name('about');

// Posts controller
Route::resource('posts', 'PostController');

