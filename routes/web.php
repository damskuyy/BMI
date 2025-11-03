<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductBEController;
use App\Http\Controllers\GalleryBEController;
use App\Http\Controllers\BlogBEController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\MemberBEController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Frontend Routes
Route::resource('/', App\Http\Controllers\HomeController::class);
Route::resource('/home', App\Http\Controllers\HomeController::class);
Route::resource('/about', App\Http\Controllers\AboutController::class);
Route::resource('/manufaktur-about', App\Http\Controllers\ManufakturAboutController::class);
Route::resource('/umkm-about', App\Http\Controllers\UmkmAboutController::class);
Route::resource('/kerajinan-about', App\Http\Controllers\KerajinanAboutController::class);
Route::resource('/members', App\Http\Controllers\MemberController::class);
Route::resource('/product', App\Http\Controllers\ProductController::class);
Route::get('/product', [ProductController::class, 'index']);
Route::resource('/gallery', App\Http\Controllers\GalleryController::class);
Route::resource('/blog', App\Http\Controllers\BlogController::class);
Route::resource('/contact', App\Http\Controllers\ContactController::class);
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Auth Routes
Route::middleware('guest')->group(function() {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Backend Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('product_be', ProductBEController::class);
    Route::resource('gallery_be', GalleryBEController::class);
    Route::resource('blog_be', BlogBEController::class);
    Route::resource('slider_be', SliderController::class);
    Route::resource('member_be', MemberBEController::class);
    Route::resource('users', UserController::class);
});