<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('home.index');
// });


Route::resource('/', App\Http\Controllers\HomeController::class);
Route::resource('/home', App\Http\Controllers\HomeController::class);
Route::resource('/about', App\Http\Controllers\AboutController::class);
Route::resource('/bmi-about', App\Http\Controllers\BmiAboutController::class);
Route::resource('/manufaktur-about', App\Http\Controllers\ManufakturAboutController::class);
Route::resource('/umkm-about', App\Http\Controllers\UmkmAboutController::class);
Route::resource('/kerajinan-about', App\Http\Controllers\KerajinanAboutController::class);
Route::resource('/members', App\Http\Controllers\MemberController::class);
Route::resource('/product', App\Http\Controllers\ProductController::class);
Route::get('/product', [ProductController::class, 'index']);
Route::resource('/gallery', App\Http\Controllers\GalleryController::class);
Route::resource('/contact', App\Http\Controllers\ContactController::class);
