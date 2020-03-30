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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', 'Backend\loginController@show')->name('login');
Route::post('/login', 'Backend\loginController@login')->name('admin');

Route::get('/register', function() {
	return view('register');
})->name('register');

Route::get('/contact', function() {
	return view('contact');
})->name('contact');
