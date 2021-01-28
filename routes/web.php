<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DonorController;

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
    Route::get('/district/{division_id}', 'Admin\DonorController@getDistrict')->name('backend.donor.district');
    Route::get('/thana/{district_id}', 'Admin\DonorController@getThana')->name('backend.donor.thana');
});

Route::group(['prefix'=>'admin/user', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\UserController@index')->name('backend.user.index');
    Route::post('/store', 'Admin\UserController@store')->name('backend.user.store');
    Route::get('/edit/{id}', 'Admin\UserController@edit')->name('backend.user.edit');
    Route::post('/update', 'Admin\UserController@update')->name('backend.user.update');
    Route::post('/edit/{id}', 'Admin\UserController@userUpdate')->name('backend.user.user_update');
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

// Admin Ambulances 
Route::group(['prefix'=>'admin/ambulance', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\AmbulanceController@index')->name('backend.ambulance.index');
    Route::post('/store', 'Admin\AmbulanceController@store')->name('backend.ambulance.store');
    Route::post('/update', 'Admin\AmbulanceController@update')->name('backend.ambulance.update');
    Route::post('/destroy', 'Admin\AmbulanceController@destroy')->name('backend.ambulance.destroy');
});

// Admin  Symptom Routes
Route::group(['prefix'=>'admin/symptom', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\SymptomController@index')->name('backend.symptom.index');
    Route::post('/store', 'Admin\SymptomController@store')->name('backend.symptom.store');
    Route::post('/update', 'Admin\SymptomController@update')->name('backend.symptom.update');
    Route::post('/destroy', 'Admin\SymptomController@destroy')->name('backend.symptom.destroy');
});

// Admin Doctor Routes
Route::group(['prefix'=>'admin/doctor', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\DoctorController@index')->name('backend.doctor.index');
    Route::post('/store', 'Admin\DoctorController@store')->name('backend.doctor.store');
    Route::post('/update', 'Admin\DoctorController@update')->name('backend.doctor.update');
    Route::post('/destroy', 'Admin\DoctorController@destroy')->name('backend.doctor.destroy');
});

// Admin Medicine Routes
Route::group(['prefix'=>'admin/medicine', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\MedicineController@index')->name('backend.medicine.index');
    Route::post('/store', 'Admin\MedicineController@store')->name('backend.medicine.store');
    Route::post('/update', 'Admin\MedicineController@update')->name('backend.medicine.update');
    Route::post('/destroy', 'Admin\MedicineController@destroy')->name('backend.medicine.destroy');
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

Route::group(['prefix'=>'admin/profile', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\AdminController@profile')->name('backend.profile');
    Route::post('/update', 'Admin\AdminController@profileUpdate')->name('backend.profile.update');
});

Route::group(['prefix'=>'admin/division', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\DivisionController@index')->name('backend.division.index');
});

Route::group(['prefix'=>'admin/district', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\DistrictController@index')->name('backend.district.index');
});

Route::group(['prefix'=>'admin/thana', 'middleware'=>'admin'], function(){
    Route::get('/', 'Admin\ThanaController@index')->name('backend.thana.index');
});

Route::get('/', 'Frontend\HomeController@home')->name('frontend.index');
Route::get('/about', 'Frontend\HomeController@about')->name('frontend.about');
Route::get('/ambulance', 'Frontend\HomeController@ambulance')->name('frontend.ambulance');
Route::get('/telemedicine', 'Frontend\HomeController@telemedicine')->name('frontend.telemedicine');
Route::get('/campaign', 'Frontend\HomeController@campaign')->name('frontend.campaign');
Route::get('/faq', 'Frontend\HomeController@faq')->name('frontend.faq');
Route::get('/gallery', 'Frontend\HomeController@gallery')->name('frontend.gallery');
Route::get('/blog', 'Frontend\HomeController@blog')->name('frontend.blog');
Route::get('/privacy-policy', 'Frontend\HomeController@contact')->name('frontend.privacy_policy');
Route::get('/terms-condition', 'Frontend\HomeController@contact')->name('frontend.terms_conditin');
Route::get('/contact', 'Frontend\HomeController@contact')->name('frontend.contact');
Route::post('/mail-send', 'Frontend\HomeController@mailSend')->name('frontend.mail.send');
Route::get('/district/{division_id}', 'Frontend\HomeController@getDistrict')->name('frontend.donor.district');
Route::get('/thana/{district_id}', 'Frontend\HomeController@getThana')->name('frontend.donor.thana');

Route::get('/register', 'Frontend\DonorController@register')->name('donor.register');
Route::post('/signup', 'Frontend\DonorController@signup')->name('donor.signup');
Route::get('/login', 'Frontend\DonorController@login')->name('donor.login');
Route::post('/signin', 'Frontend\DonorController@signin')->name('donor.signin');
Route::post('/donor/logout','Frontend\DonorController@logout')->name('donor.logout');
Route::group(['prefix'=>'donor', 'middleware'=>'donor'], function(){
    Route::get('/dashboard', 'Frontend\DonorController@dashboard')->name('donor.dashboard');
    Route::post('/update/{id}', 'Frontend\DonorController@update')->name('donor.update');
    Route::get('/blog-create/{id}', 'Frontend\DonorController@blogCreate')->name('donor.blog.create');
    Route::post('/blog-store/{id}', 'Frontend\DonorController@blogStore')->name('donor.blog.store');
});