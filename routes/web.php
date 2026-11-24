<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\Admin\FeedbackController;

Route::get('/', function () {
    return view('frontend.ui.home');
});


Route::get('/register',[AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register.post');

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.post');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('role:admin')->group(function () {
    Route::get('/admin/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::prefix('admin')->as('admin.')->group(function () {
        Route::resource('events', EventController::class);
        Route::resource('users', UserManagementController::class)->only(['index','show','create','store','edit','update','destroy']);
        Route::resource('payments', PaymentController::class)->only(['index','create','store','show']);
        Route::resource('venues', VenueController::class);
        Route::resource('feedback', FeedbackController::class)->only(['index','create','store','show']);
    });
});
    
Route::middleware('role:customer')->get('/homepage', function() {
    return view('frontend.ui.home');
})->name('homepage');

Route::view('/gallery', 'frontend.ui.gallery')->name('gallery');