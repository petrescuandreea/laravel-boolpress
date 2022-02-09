<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'GuestController@home') -> name('home');

Route::post('/login', 'Auth\LoginController@login') -> name('login');

Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

Route::get('/posts', 'GuestController@posts') -> name('posts');

Route::middleware('auth') -> group(function() {
    Route::get('/posts/create', 'GuestController@create') -> name('create');
    Route::post('/posts/store', 'GuestController@store') -> name('store');
    Route::get('/posts/edit/{id}', 'GuestController@edit') -> name('edit');
    Route::post('/posts/update/{id}', 'GuestController@update') -> name('update');
});