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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('account')->name('account.')->group(function () {
    Route::get('create', 'AccountController@create')->name('create');
    Route::post('store', 'AccountController@store')->name('store');
});

Route::prefix('ledger')->name('ledger.')->group(function () {
    Route::get('{id}/create_income', 'AccountController@create_income')->name('create_income');
    Route::post('store_income', 'AccountController@store_income')->name('store_income');
    Route::get('{id}/create_expenses', 'AccountController@create_expenses')->name('create_expenses');
    Route::post('store_expenses', 'AccountController@store_expenses')->name('store_expenses');
});
