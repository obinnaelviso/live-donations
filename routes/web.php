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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/donate', 'HomeController@donate')->name('donate');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/make-donations/{campaign}', 'HomeController@makeDonation')->name('make-donation');
Route::post('/make-donations/{campaign}', 'HomeController@processDonation')->name('process-donation');

Auth::routes(['register' => false]);

Route::get('/home', 'DashboardController@index')->name('home');

Route::resource('campaigns', 'CampaignController')->except('show');
Route::resource('donations', 'DonationController')->only(['index', 'store', 'destroy']);
