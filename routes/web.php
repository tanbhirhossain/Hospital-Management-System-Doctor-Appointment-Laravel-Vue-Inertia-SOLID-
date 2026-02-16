<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Add more frontend routes here as needed
// Route::get('/about', [HomeController::class, 'about'])->name('about');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::post('/appointment', [HomeController::class, 'bookAppointment'])->name('appointment.store');
