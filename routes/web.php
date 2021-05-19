<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin-panel/users', 'UserController@index')->name('admin-panel-users')->middleware('auth');
Route::get('/admin-panel/users/create', 'UserController@create')->name('admin-panel-users-create')->middleware('auth');

