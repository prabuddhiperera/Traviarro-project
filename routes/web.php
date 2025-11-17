<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\AdminBookingController;

// ----------------------------------------------------------
// 🌐 Public Pages
// ----------------------------------------------------------
Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');

// ----------------------------------------------------------
// 🧭 Destination & Services
// ----------------------------------------------------------
Route::get('/destination', [DestinationController::class, 'index'])->name('destination');
Route::get('/destination/{destination}', [DestinationController::class, 'show'])->name('destination.show');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

// ----------------------------------------------------------
// 🧳 Tours
// ----------------------------------------------------------
Route::get('/tours', [TourController::class, 'index'])->name('tours');
Route::get('/tours/{id}', [TourController::class, 'show'])->name('tours.show');

// ----------------------------------------------------------
// 🔐 Admin Authentication + Dashboard
// ----------------------------------------------------------
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// ----------------------------------------------------------
// Admin Bookings
// ----------------------------------------------------------
Route::prefix('admin')->group(function () {
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
    Route::post('/bookings', [AdminBookingController::class, 'store'])->name('admin.bookings.store');
    Route::delete('/bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('admin.bookings.destroy');
    Route::get('admin/bookings/{booking}/edit', [AdminBookingController::class,'edit'])->name('admin.bookings.edit');
    Route::put('admin/bookings/{booking}', [AdminBookingController::class,'update'])->name('admin.bookings.update');
});

// ----------------------------------------------------------
// Charts
// ----------------------------------------------------------
Route::get('/charts', [AdminController::class, 'charts'])->name('admin.charts');
Route::get('/admin/charts/data', [ChartController::class, 'getChartData'])->name('admin.charts.data');
