<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sbVoterController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\roleAdmin;
use App\Http\Middleware\isActive;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{user}/roles', [UserController::class, 'editRoles']);
Route::post('/users/{user}/roles', [UserController::class, 'updateRoles']);

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth',roleAdmin::class])->name('admin');

Route::resource('users', UserController::class)->middleware(['auth',roleAdmin::class]);

Route::get('/sbvoters/search', [SbVoterController::class, 'search'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', isActive::class])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
