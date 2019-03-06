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

Route::get('/reverse/words', 'ParagraphController@index')->name('paragraph.reverse_words_index');
Route::post('/reverse/words', 'ParagraphController@reversWords')->name('paragraph.reverse_words');

Route::get('/reverse/chars', 'ParagraphController@showReversChars')->name('paragraph.reverse_chars_index');
Route::post('/reverse/chars', 'ParagraphController@reversChars')->name('paragraph.reverse_chars');

Route::get('/reverse/sort', 'ParagraphController@showSortAlphabet')->name('paragraph.reverse_sort_index');
Route::post('/reverse/sort', 'ParagraphController@sortAlphabet')->name('paragraph.reverse_sort');

Route::get('/reverse/encrypt', 'ParagraphController@showEncrypt')->name('paragraph.encrypt_index');
Route::post('/reverse/encrypt', 'ParagraphController@encrypt')->name('paragraph.encrypt_sort');

Route::get('/amortization', 'AmortizationController@index')->name('amortization.index');
Route::post('/amortization', 'AmortizationController@calculateAmortization')->name('amortization.calculate');
