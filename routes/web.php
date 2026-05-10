<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\Student\ClearanceController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/clearance/request', [\App\Http\Controllers\Student\ClearanceController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('clearance.request');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::resource('admin/departments', \App\Http\Controllers\Admin\DepartmentController::class);
    Route::get('admin/requests', [\App\Http\Controllers\Admin\ClearanceRequestController::class, 'index'])->name('admin.requests.index');
    Route::patch('admin/requests/{id}', [\App\Http\Controllers\Admin\ClearanceRequestController::class, 'update'])->name('admin.requests.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
