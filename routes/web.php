<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('admin-panel/user', 'UserController')->middleware('checkAdmin');

Route::middleware('checkAdmin')->group(function () {
    Route::get('admin-panel/user', 'UserController@index')->name('user.index');
    Route::get('admin-panel/user/create', 'UserController@create')->name('user.create');
    Route::get('admin-panel/user/{user}/edit', 'UserController@edit')->name('user.edit');

    Route::post('admin-panel/user', 'UserController@store')->name('user.store');
    Route::post('admin-panel/user/{user}', 'UserController@update')->name('user.update');
    Route::post('admin-panel/user/{user}', 'UserController@destroy')->name('user.destroy');
});