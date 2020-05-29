<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'CompanyController@index');
Route::get('show/{company}', 'CompanyController@show')->name('show.company');
Route::post('/ajax_income', 'FinancialController@store_income')->name('ajax.income');
Route::post('/ajax_consumption', 'FinancialController@store_consumption')->name('ajax.consumption');

