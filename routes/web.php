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

Route::get('/', 'Backend\HomeController@show')->name('home');

Route::get('/login', 'Backend\loginController@show')->name('login');
Route::post('/login', 'Backend\loginController@login')->name('admin');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/login_home', 'Backend\HomeController@login_home')->name('login_home');
	Route::post('/login_home', 'Backend\loginController@logout')->name('logout');
	Route::get('/apply', 'Backend\ApplyController@show')->name('applyFor');
	Route::post('/apply', 'Backend\ApplyController@apply')->name('applying');
	Route::get('/add', 'Backend\ArticleController@show')->name('add');
	Route::post('/add', 'Backend\ArticleController@store')->name('store');
	Route::get('/center', 'Backend\CenterController@show')->name('center');
	Route::post('/center', 'Backend\CenterController@deleted')->name('article_delete');
	Route::get('/match', 'Backend\MatchController@show')->name('match');
	Route::post('/match', 'Backend\MatchController@store')->name('match_store');
	// Route::get('revised', function () {
	// 	return view('revise_article');
	// })->name('revised');
	// Route::post('')
});


Route::get('/register', function () {
	return view('register');
})->name('register');

Route::post('/register', 'Backend\loginController@register')->name('registration');
Route::get('/contact', 'Backend\ContactController@show')->name('contact');
Route::post('/contact', 'Backend\ContactController@send')->name('send');

Route::get('/warning', 'Backend\WarningController@show')->name('warning');
Route::post('/warning', 'Backend\WarningController@send')->name('mail-reset-password');
Route::get('/rp/{token}', 'Backend\WarningController@ABC')->name('get-reset-pwd-page');
Route::post('/reset-password', 'Backend\WarningController@BCD')->name('reset-password');
Route::get('/87', 'Backend\HomeController@debug')->name('debug');
