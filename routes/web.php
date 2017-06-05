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

Route::get('/', function () {return view('home');});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', function () {return view('contact');})->name('contact');
Route::post('/contact', 'HomeController@contact');

Route::get('/about', function () {return view('about');})->name('about');

Route::get('/photography', function() {return view('photography');})->name('photography');
//Route::get('/show', 'Test\HelloController@show');

Route::get('/program', function() {return view('program');})->name('program');

Route::get('/guitar', function() {return view('guitar');})->name('guitar');

Route::group(['namespace' => 'Test', 'prefix' => 'test'], function () {
    Route::get('/show', 'HelloController@show');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {return view('admin.index');});
    Route::get('/index', function () {return view('admin.index');});

    Route::get('/album', function () {return view('admin.album');});
    Route::post('/albumupdate', 'PostController@albumUpdate');
    Route::post('/album', 'PostController@album');

    Route::post('/albumslist', 'PostController@albumslist');
    Route::post('/photos', 'PostController@getPhotos');
});

Auth::routes();
