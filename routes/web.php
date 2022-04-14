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
    return view('Frontend.layouts.master');
});


Route::group(['prefix'=>'hotel','as'=>'hotel.'], function(){
    Route::get('/', 'HotelController@index')->name('index');
    Route::get('/add-hotel', 'HotelController@addHotel')->name('add');
    Route::post('/store-hotel', 'HotelController@store')->name('store');
    Route::post('/edit-hotel/{id}', 'HotelController@edit')->name('edit');
    Route::post('/update-hotel/{id}', 'HotelController@update')->name('update');
    Route::post('/delete-hotel/{id}', 'HotelController@delete')->name('delete');
});
