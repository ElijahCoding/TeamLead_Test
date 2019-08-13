<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');

Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
