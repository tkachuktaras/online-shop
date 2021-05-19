<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/admin-panel', function () {
    return view('admin-panel');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin-panel', function () {
    return view('admin-panel.admin-panel');
})->middleware('auth');

Route::resource('/admin-panel/categories', 'UserAdminPanelController')->middleware('auth');
Route::resource('/admin-panel/orders', 'UserAdminPanelController')->middleware('auth');
Route::resource('/admin-panel/products', 'UserAdminPanelController')->middleware('auth');
Route::resource('/admin-panel/users', 'UserAdminPanelController')->middleware('auth');