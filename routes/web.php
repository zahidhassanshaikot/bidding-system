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
Route::post('user-register', 'FrontEndController@userReg')->name('user-register');
