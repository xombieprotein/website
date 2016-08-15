<?php

Route::get('/', 'PagesController@home');
Route::get('about', 'PagesController@about');
Route::get('profile', 'PagesController@profile');
Route::get('shop', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
]);
Route::get('/show/{id}', [
	'uses' => 'ProductController@showItem',
	'as' => 'product.show'
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
Route::get('profile/{id}/edit', [
	'uses' => 'PagesController@editProfile',
	'as' => 'profile.edit'
]);
Route::patch('profile/{id}', 'PagesController@updateProfile');
Route::delete('profile/delete/{id}', 'PagesController@deleteProfile');
