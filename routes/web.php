<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\ReviewController;


// ----------------------------------------------------------
// 🌐 Public Pages
// ----------------------------------------------------------
Route::get('/', [ReviewController::class, 'homeReviews'])->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


// ----------------------------------------------------------
// 🧭 Destination & Services
// ----------------------------------------------------------
Route::get('/destination', [DestinationController::class, 'index'])->name('destination');
Route::get('/destination/{destination}', [DestinationController::class, 'show'])->name('destination.show');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');


// ----------------------------------------------------------
// 🧳 TOURS (PUBLIC)
// ----------------------------------------------------------
Route::get('/tours', [TourController::class, 'customerTours'])->name('tours');
Route::get('/tours/{id}', [TourController::class, 'customerShow'])->name('tours.show');


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
    Route::get('/bookings/{booking}/edit', [AdminBookingController::class, 'edit'])->name('admin.bookings.edit');
    Route::put('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');
});


// ----------------------------------------------------------
// Admin Customers
// ----------------------------------------------------------
Route::prefix('admin')->group(function () {

    Route::get('/customers', [UserController::class, 'index'])->name('customers.index');
    Route::post('/customers', [UserController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}/edit', [UserController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [UserController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [UserController::class, 'destroy'])->name('customers.destroy');
});


// ----------------------------------------------------------
// Admin Tours Management
// ----------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
    Route::get('/tours/create', [TourController::class, 'create'])->name('tours.create');
    Route::post('/tours', [TourController::class, 'store'])->name('tours.store');
    Route::get('/tours/{tour}/edit', [TourController::class, 'edit'])->name('tours.edit');
    Route::put('/tours/{tour}', [TourController::class, 'update'])->name('tours.update');
    Route::delete('/tours/{tour}', [TourController::class, 'destroy'])->name('tours.destroy');
});


// ----------------------------------------------------------
// Admin Services
// ----------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/services', [AdminServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [AdminServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [AdminServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [AdminServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [AdminServiceController::class, 'destroy'])->name('services.destroy');
});


// ----------------------------------------------------------
// Charts
// ----------------------------------------------------------
Route::get('/charts', [AdminController::class, 'charts'])->name('admin.charts');
Route::get('/admin/charts/data', [ChartController::class, 'getChartData'])->name('admin.charts.data');
