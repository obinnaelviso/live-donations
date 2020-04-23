<?php

use Illuminate\Support\Facades\Auth;
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
Route::post('/contact/send', 'HomeController@send_mail')->name('send.mail');
Route::get('/make-donations/{campaign}', 'HomeController@makeDonation')->name('make-donation');
Route::post('/make-donations/{campaign}', 'HomeController@processDonation')->name('process-donation');

Auth::routes(['register' => false]);

Route::get('/home', 'DashboardController@index')->name('home');

Route::resource('campaigns', 'CampaignController')->except('show');
Route::resource('donations', 'DonationController')->only(['index', 'store', 'destroy']);
Route::group(['prefix' => 'settings'], function () {
    Route::resource('partners', 'PartnerController')->only(['index', 'store', 'destroy']);
    Route::resource('slideshow', 'SlideshowController')->only(['index', 'store', 'destroy']);
    Route::get('homepage', 'SettingsController@homepage')->name('homepage');
    Route::put('homepage/{homepage_settings}', 'SettingsController@homepage_set')->name('homepage.set');
    Route::get('about', 'SettingsController@about')->name('settings.about');
    Route::put('about/{about_settings}', 'SettingsController@about_set')->name('settings.about.set');
});

// Route::get('/settings/homepage')
