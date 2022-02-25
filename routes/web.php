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

Auth::routes();


//area privata - Back Office
Route::prefix("admin")->namespace("Admin")->middleware("auth")->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("posts","PostController");
    Route::resource("categories","CategoryController");
    Route::resource("tags","TagController");
});

Route::get('{any?}', function () {
    return view('front');
})->where("any", ".*");

