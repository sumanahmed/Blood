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

Route::group(['prefix'=>'admin/donor', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\DonorController@index')->name('backend.donor.index');
    Route::post('/store', 'Admin\DonorController@store')->name('backend.donor.store');
    Route::post('/update', 'Admin\DonorController@update')->name('backend.donor.update');
    Route::post('/destroy', 'Admin\DonorController@destroy')->name('backend.donor.destroy');
});

Route::group(['prefix'=>'admin/user', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\UserController@index')->name('backend.user.index');
    Route::post('/store', 'Admin\UserController@store')->name('backend.user.store');
    Route::post('/update', 'Admin\UserController@update')->name('backend.user.update');
    Route::post('/destroy', 'Admin\UserController@destroy')->name('backend.user.destroy');
});

Route::group(['prefix'=>'admin/gallery', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\GalleryController@index')->name('backend.gallery.index');
    Route::post('/store', 'Admin\GalleryController@store')->name('backend.gallery.store');
    Route::post('/update', 'Admin\GalleryController@update')->name('backend.gallery.update');
    Route::post('/destroy', 'Admin\GalleryController@destroy')->name('backend.gallery.destroy');
});

Route::group(['prefix'=>'admin/video', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\VideoController@index')->name('backend.video.index');
    Route::post('/store', 'Admin\VideoController@store')->name('backend.video.store');
    Route::post('/update', 'Admin\VideoController@update')->name('backend.video.update');
    Route::post('/destroy', 'Admin\VideoController@destroy')->name('backend.video.destroy');
});

Route::group(['prefix'=>'admin/category', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\CategoryController@index')->name('backend.category.index');
    Route::post('/store', 'Admin\CategoryController@store')->name('backend.category.store');
    Route::post('/update', 'Admin\CategoryController@update')->name('backend.category.update');
    Route::post('/destroy', 'Admin\CategoryController@destroy')->name('backend.category.destroy');
});
