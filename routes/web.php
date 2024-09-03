<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('youtube/video', [EventController::class, 'index'])->middleware('auth');
    Auth::routes(['verify'  => true]);
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
