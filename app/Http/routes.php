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
Route::get('/shopping-cart', [
	'uses' => 'ProductController@getCart',
	'as' => 'product.shoppingCart'
]);
Route::get('/checkout', [
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout'
]);
Route::post('/checkout', [
	'uses' => 'ProductController@postCheckout',
	'as' => 'checkout'
]);

Route::auth();
