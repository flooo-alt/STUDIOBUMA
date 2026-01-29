<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/', function () {
    return view('home');
});

// Booking Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/Booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/Booking', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store.alt'); // Alias untuk lowercase
});

// Auth 
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Admin Routes (Protected)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/bookings', [AdminController::class, 'bookingsList'])->name('bookings.index');
    Route::patch('/admin/booking/{id}/status', [AdminController::class, 'updateStatus'])->name('booking.updateStatus');
    Route::patch('/admin/booking/{id}/progress', [AdminController::class, 'updateProgress'])->name('booking.updateProgress');
    Route::delete('/admin/booking/{id}', [AdminController::class, 'destroy'])->name('booking.destroy');
    
    // Package CRUD Routes
    Route::resource('packages', PackageController::class);
});

// Customer Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/booking/{id}/tracker', [CustomerController::class, 'tracker'])->name('booking.tracker');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
