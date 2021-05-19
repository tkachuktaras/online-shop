<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/admin-panel', function () {
    return view('admin-panel');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
