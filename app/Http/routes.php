<?php

Route::get('/', 'PagesController@home');
Route::get('about', 'PagesController@about');
Route::get('shop', 'PagesController@shop');
Route::get('profile', 'PagesController@profile');
Route::auth();

Route::get('/home', 'HomeController@index');
