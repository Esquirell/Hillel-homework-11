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


Route::get('/', function() {
    return view('index');
})->name('returnhome');

Route::resource('/profits', 'ProfitController');
Route::resource('/costs', 'CostController');

Route::get('/profits/user/profits', 'ProfitController@userProfits');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


