<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('checkAdmin')->group(function () {
    Route::get('admin-panel/user', 'UserController@index')->name('user.index');
    Route::get('admin-panel/user/create', 'UserController@create')->name('user.create');
    Route::get('admin-panel/user/{user}/edit', 'UserController@edit')->name('user.edit');

    Route::post('admin-panel/user', 'UserController@store')->name('user.store');
    Route::post('admin-panel/user/{user}/update', 'UserController@update')->name('user.update');
    Route::post('admin-panel/user/{user}/destroy', 'UserController@destroy')->name('user.destroy');



    Route::get('admin-panel/product', 'ProductController@index')->name('product.index');
    Route::get('admin-panel/product/create', 'ProductController@create')->name('product.create');
    Route::get('admin-panel/product/{product}/edit', 'ProductController@edit')->name('product.edit');
    Route::get('admin-panel/product/{product}/show', 'ProductController@show')->name('product.show');

    Route::post('admin-panel/product', 'ProductController@store')->name('product.store');
    Route::post('admin-panel/product/{product}/update', 'ProductController@update')->name('product.update');
    Route::post('admin-panel/product/{product}/destroy', 'ProductController@destroy')->name('product.destroy');



    Route::get('admin-panel/category', 'CategoryController@index')->name('category.index');
    Route::get('admin-panel/category/create', 'CategoryController@create')->name('category.create');
    Route::get('admin-panel/category/{category}/edit', 'CategoryController@edit')->name('category.edit');
    Route::get('admin-panel/category/{category}/show', 'CategoryController@show')->name('category.show');

    Route::post('admin-panel/category', 'CategoryController@store')->name('category.store');
    Route::post('admin-panel/category/{category}/update', 'CategoryController@update')->name('category.update');
    Route::post('admin-panel/category/{category}/destroy', 'CategoryController@destroy')->name('category.destroy');
});
