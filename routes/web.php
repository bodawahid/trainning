<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


// ajax controller 
Route::get('ajax/{offer}/update',[AjaxController::class,'edit'])->name('ajax.edit') ;
Route::post('ajax/update', [AjaxController::class, 'ajaxUpdate'])->name('ajax.update');
Route::resource('ajax/offers/', AjaxController::class);
Route::post('ajax/destroy', [AjaxController::class, 'delete'])->name('ajax.destroy');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('youtube/video', [EventController::class, 'index'])->middleware('auth');
    Auth::routes(['verify'  => true]);
    Route::delete('offers/{offer}/forceDelete', [OfferController::class, 'forceDelete'])->name('offers.force.delete');
    Route::get('offers/{offer}/restore', [OfferController::class, 'restore'])->name('offers.restore');
    Route::get('offers/trash', [OfferController::class, 'trash'])->name('offers.trash');
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
