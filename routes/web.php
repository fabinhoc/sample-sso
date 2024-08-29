<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Dashboard');
// });

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UserController::class)->middleware(['auth', 'verified']);

Route::resource('applications', ApplicationController::class)->middleware(['auth', 'verified']);
Route::resource('permissions', PermissionController::class)->middleware(['auth', 'verified']);
Route::resource('roles', RoleController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
