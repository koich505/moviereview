<?php

Route::get('/','ReviewController@index')->name('reviews.index');
Route::resource('/reviews','ReviewController')->except(['index','show'])->middleware('auth');
Route::resource('/reviews','ReviewController')->only('show');
Auth::routes();