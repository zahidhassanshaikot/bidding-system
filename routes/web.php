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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'FrontEndController@index')->name('/');
Route::get('registration', 'FrontEndController@registration')->name('registration');
Route::get('user-login', 'FrontEndController@userLogin')->name('user-login');
Route::get('dashboard', 'FrontEndController@dashboard')->name('dashboard');
Route::get('add-product', 'FrontEndController@addProduct')->name('add-product');
Route::get('all-product', 'FrontEndController@allProduct')->name('all-product');
Route::get('all-order/{id}', 'FrontEndController@allOrder')->name('all-order');
Route::get('monthly-sell-product', 'FrontEndController@monthlySellProduct')->name('monthly-sell-product');

Route::get('single-product/{id}', 'FrontEndController@singleProduct')->name('single-product');
Route::get('search/ddl/{id}', 'FrontEndController@searchDdl')->name('search-ddl');
Route::get('user-remove/{id}', 'FrontEndController@removeUser')->name('user-remove');
Route::get('remove-product/{id}', 'FrontEndController@removeProduct')->name('remove-product');
Route::get('bid-status/{status}/{id}', 'FrontEndController@bidStatus')->name('bid-status');


Route::post('save-product-info', 'FrontEndController@saveProductInfo')->name('save-product-info');
Route::post('bid-now', 'FrontEndController@bidNow')->name('bid-now');
Route::post('user-register', 'FrontEndController@userReg')->name('user-register');
Route::post('search-product', 'FrontEndController@searchProduct')->name('search-product');
