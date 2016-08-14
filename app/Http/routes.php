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
Route::get('/reduce/{id}', [
	'uses' => 'ProductController@getReduceItem',
	'as' => 'product.reduce'
]);
Route::get('/remove/{id}', [
	'uses' => 'ProductController@getRemoveItem',
	'as' => 'product.remove'
]);
Route::get('/add/{id}', [
	'uses' => 'ProductController@getAddItem',
	'as' => 'product.add'
]);
Route::get('/shopping-cart', [
	'uses' => 'ProductController@getCart',
	'as' => 'product.shoppingCart',
	'middleware' => 'auth'
]);
Route::get('/checkout', [
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout',
	'middleware' => 'auth'
]);
Route::post('/checkout', [
	'uses' => 'ProductController@postCheckout',
	'as' => 'checkout',
	'middleware' => 'auth'
]);

Route::auth();
