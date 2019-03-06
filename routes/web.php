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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    // All my routes that needs a logged in user
    Route::get('/reverse-words', 'ReverseWordsController@index')->name('paragraph.index');
    Route::post('/reverse-words', 'ReverseWordsController@revers')->name('paragraph.reverse');
});

