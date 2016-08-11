<?php

Route::get('/', 'PagesController@home');
Route::get('about', 'PagesController@about');
Route::get('profile', 'PagesController@profile');
Route::get('shop', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
]);
Route::get('/add-to-cart/{id}', [
	'uses' => 'ProductController@getAddToCart',
	'as' => 'product.addToCart'
]);
Route::auth();
