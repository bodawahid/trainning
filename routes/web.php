<?php

use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes(['verify' => true]);

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::resource('/offers', OfferController::class);
});

Route::middleware('verified')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});
Route::get(
    '/redirect/{service}',
    [SocialController::class, 'redirect']
)->name('facebook.login');

Route::get(
    '/auth/{service}/callback',
    [SocialController::class, 'callback']
)->name('facebook.callback');
