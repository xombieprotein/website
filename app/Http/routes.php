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
]);
Route::get('/checkout', [
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout',
]);
Route::post('/checkout', [
	'uses' => 'ProductController@postCheckout',
	'as' => 'checkout',
]);

Route::auth();
Route::get('profile/{id}/edit', [
	'uses' => 'PagesController@editProfile',
	'as' => 'profile.edit'
]);
Route::patch('profile/{id}', 'PagesController@updateProfile');
Route::delete('profile/delete/{id}', 'PagesController@deleteProfile');

Route::get('product/add', [
	'uses' => 'PagesController@addProduct',
	'middleware' => ['auth', 'admin']
]);

Route::post('product/store', 'PagesController@storeProduct');

Route::get('product/edit/{id}', [
	'uses' => 'PagesController@editProduct',
	'as' => 'product.edit',
	'middleware' => ['auth', 'admin']
]);
Route::patch('product/update/{id}', 'PagesController@updateProduct');
Route::delete('product/delete/{id}', 'PagesController@deleteProduct');

//Route for creating an admin only dashboard. This route is currently not utilised.
Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);