<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $settings = \App\Site_setting::find(1);
    $data['hotels'] = \App\Models\Hotel::all();
    $data['cars'] = \App\Models\Car::all();
        \Illuminate\Support\Facades\Session::put('site_setting',$settings);
//        dd(\Illuminate\Support\Facades\Session::get('site_setting',$settings));
    return view('Frontend.layouts.master',$data);
});


Route::group(['prefix'=>'hotel','as'=>'hotel.'], function(){
    Route::get('/', 'HotelController@index')->name('index');
    Route::get('/add-hotel', 'HotelController@addHotel')->name('add');
    Route::post('/store-hotel', 'HotelController@store')->name('store');
    Route::post('/edit-hotel/{id}', 'HotelController@edit')->name('edit');
    Route::post('/update-hotel/{id}', 'HotelController@update')->name('update');
    Route::post('/delete-hotel/{id}', 'HotelController@delete')->name('delete');
});

//Admin login
Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/submit', [\App\Http\Controllers\AdminController::class, 'submit'])->name('admin.submit');
Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
Route::get('/hotel/detail/{id}', [\App\Http\Controllers\HotelsController::class, 'detail'])->name('hotel.detail');
Route::post('/enc', [\App\Http\Controllers\EnquiryController::class, 'storeEnquiry'])->name('enc');
Route:: post('/store-booking/{id}', [\App\Http\Controllers\BookingController::class, 'storeBooking'])->name('book.hotel')->middleware('auth');
Route:: get('/approve/{id}', [\App\Http\Controllers\BookingController::class, 'approve'])->name('book.approve')->middleware('auth');

//site_setting
\Illuminate\Support\Facades\Route::get('/site_setting',[\App\Http\Controllers\SiteSettingController::class,'site'])->name('site.setting');
\Illuminate\Support\Facades\Route::post('/update_settings',[\App\Http\Controllers\SiteSettingController::class,'updateSetting'])->name('update.setting');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/hotels', 'HotelsController');
Route::resource('admin/cars', 'CarsController');

Route::resource('admin/enquiry', 'PostsController');

Route::resource('admin/enquiry', 'EnquiryController');

Route::resource('admin/booking', 'BookingController');
