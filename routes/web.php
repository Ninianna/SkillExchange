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

Route::group(['middleware' => ['auth']], function () {
	Route::get('login_home',function(){
		return view('login_home');
	})->name('login_home');
	Route::get('apply', function(){
		return view('apply');
	})->name('apply');
});
Route::post('login_home', 'Backend\loginController@logout')->name('logout');

Route::get('/register', function() {
	return view('register');
})->name('register');

Route::post('/register', 'Backend\loginController@register')->name('registration');

Route::get('/contact', function() {
	return view('contact');
})->name('contact');

Route::get('/apply', function(){
	return view('apply');
})->name('apply');
