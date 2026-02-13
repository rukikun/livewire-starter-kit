<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileTrackerController;

// Redirect root to dashboard if authenticated, otherwise to login
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
})->name('landing');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// File Tracker Routes (protected)
Route::get('/filetracker', [FileTrackerController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('filetracker.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
