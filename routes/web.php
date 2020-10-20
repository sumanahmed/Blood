<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin','Admin\AdminController@login')->name('backend.admin.login');
Route::post('/admin/signin','Admin\AdminController@signin')->name('backend.admin.signin');
Route::post('/admin/logout','Admin\AdminController@logout')->name('backend.admin.logout');
Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function(){
    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('backend.dashboard');
});
