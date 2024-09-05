<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Hospital\HospitalDoctorController;
use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\Relation\TestRelation;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// many to many relationships .
Route::get('/manytomanyrelationShip', [TestRelation::class, 'manytomany'])->name('relation.manytomany');
// showing the sevices of each doctor 
Route::get('hospitals/{doctor}/services',[HospitalDoctorController::class,'services'])->name('doctors.services') ;

// doesn't have any doctor 
Route::get('/hospitals/DoesnotHaveDoctors', [HospitalDoctorController::class, 'DoesnotHaveDoctors']);


// has at least one male doctors 
Route::get('/hospitals/hasMaleDcotors', [HospitalDoctorController::class, 'hasMaleDoctors']);


//  where has doctors . 
Route::get('/hospitals/hasDoctors', [HospitalDoctorController::class, 'hasDoctors']);



// life application on the one to many relationship 

Route::get('/hospitals', [HospitalDoctorController::class, 'hospitals'])->name('hospitals');
Route::get('/hospitals/{hospital}/doctors', [HospitalDoctorController::class, 'doctors'])->name('hospitals.doctors');

// relations routes 
Route::get('/relation/onetomany', [TestRelation::class, 'onetomany'])->name('relation.onetomany');


// ajax controller 
Route::get('ajax/{offer}/update', [AjaxController::class, 'edit'])->name('ajax.edit');
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
