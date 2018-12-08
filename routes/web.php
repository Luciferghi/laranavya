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

Route::get('/','HomePageController@index')->name('HomePage');
Route::get('/shop','ShopController@index')->name('Shop.index');
Route::get('/featured','ShopController@featured')->name('Shop.featured');
Route::get('/shop/{product}','ShopController@show')->name('Shop.show');
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.store');
Route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');
Route::post('/cart/{product}','CartController@subupdate')->name('cart.subupdate');
Route::put('/cart/{product}','CartController@addupdate')->name('cart.addupdate');


Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');


Route::get('/empty', 'CartController@clear')->name('cart.clear');




Route::get('/checkout','CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout','CheckoutController@store')->name('checkout.store');


Route::get('/thankyou','ConfirmationController@index')->name('confirmation.index');



Route::view('/contact','contact');

Route::view('/about','about');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
