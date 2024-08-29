<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);

Route::middleware('verified')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/redirect/{service}',
[SocialController::class,'redirect'])->name('facebook.login'); 

Route::get('/auth/{service}/callback',
[SocialController::class,'callback'])->name('facebook.callback'); 
