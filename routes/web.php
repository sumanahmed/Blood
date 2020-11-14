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

Route::group(['prefix'=>'admin/post', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\PostController@index')->name('backend.post.index');
    Route::post('/store', 'Admin\PostController@store')->name('backend.post.store');
    Route::post('/update', 'Admin\PostController@update')->name('backend.post.update');
    Route::post('/destroy', 'Admin\PostController@destroy')->name('backend.post.destroy');
});

Route::group(['prefix'=>'admin/faq', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\FaqController@index')->name('backend.faq.index');
    Route::post('/store', 'Admin\FaqController@store')->name('backend.faq.store');
    Route::post('/update', 'Admin\FaqController@update')->name('backend.faq.update');
    Route::post('/destroy', 'Admin\FaqController@destroy')->name('backend.faq.destroy');
});

Route::group(['prefix'=>'admin/slider', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\SliderController@index')->name('backend.slider.index');
    Route::post('/store', 'Admin\SliderController@store')->name('backend.slider.store');
    Route::post('/update', 'Admin\SliderController@update')->name('backend.slider.update');
    Route::post('/destroy', 'Admin\SliderController@destroy')->name('backend.slider.destroy');
});

Route::group(['prefix'=>'admin/sponsor', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\SponsorController@index')->name('backend.sponsor.index');
    Route::post('/store', 'Admin\SponsorController@store')->name('backend.sponsor.store');
    Route::post('/update', 'Admin\SponsorController@update')->name('backend.sponsor.update');
    Route::post('/destroy', 'Admin\SponsorController@destroy')->name('backend.sponsor.destroy');
});

Route::group(['prefix'=>'admin/campaign', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\CampaignController@index')->name('backend.campaign.index');
    Route::post('/store', 'Admin\CampaignController@store')->name('backend.campaign.store');
    Route::post('/update', 'Admin\CampaignController@update')->name('backend.campaign.update');
    Route::post('/destroy', 'Admin\CampaignController@destroy')->name('backend.campaign.destroy');
});

Route::group(['prefix'=>'admin/division', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\DivisionController@index')->name('backend.division.index');
});

Route::get('/', 'Frontend\HomeController@home')->name('frontend.index');
Route::get('/about', 'Frontend\HomeController@about')->name('frontend.about');
Route::get('/campaign', 'Frontend\HomeController@campaign')->name('frontend.campaign');
Route::get('/faq', 'Frontend\HomeController@faq')->name('frontend.faq');
Route::get('/gallery', 'Frontend\HomeController@gallery')->name('frontend.gallery');
Route::get('/blog', 'Frontend\HomeController@blog')->name('frontend.blog');
Route::get('/contact', 'Frontend\HomeController@contact')->name('frontend.contact');