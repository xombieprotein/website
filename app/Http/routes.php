<?php

Route::get('/', 'PagesController@home');
Route::get('about', 'PagesController@about');
Route::get('shop', 'PagesController@shop');
Route::auth();

Route::get('/home', 'HomeController@index');
