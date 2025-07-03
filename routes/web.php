<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sbVoterController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyQuestionController;
use App\Http\Controllers\SurveyAnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\roleAdmin;
use App\Http\Middleware\isActive;
use App\Http\Middleware\hasCounty;


Route::get('/', function () {
    return view('welcome');
});


Route::put('/questions/{question}', [SurveyQuestionController::class, 'update'])->name('questions.update');
Route::get('/questions/{id}/edit', [SurveyQuestionController::class, 'edit'])->name('questions.edit');
Route::get('/surveys/{survey}/questions', [SurveyQuestionController::class, 'index'])->name('surveys.survey-questions')->middleware(['auth',roleAdmin::class]);
Route::get('/surveys/{survey}/questions/{question}/edit', [SurveyQuestionController::class, 'edit'])->name('surveys.survey-questions.edit')->middleware(['auth',roleAdmin::class]);
Route::get('/surveys/{survey}/questions/create', [SurveyQuestionController::class, 'create'])->name('survey-questions.create')->middleware(['auth',roleAdmin::class]);
Route::post('/survey-questions', [SurveyQuestionController::class, 'store'])->name('survey-questions.store')->middleware(['auth',roleAdmin::class]);

Route::post('/surveys/{survey}/submit', [SurveyAnswerController::class, 'store'])->name('surveys.submit')->middleware(['auth',roleAdmin::class]);


Route::resource('surveys', SurveyController::class)->middleware(['auth',roleAdmin::class]);


Route::get('/users/{user}/roles', [UserController::class, 'editRoles'])->middleware(['auth',roleAdmin::class]);
Route::post('/users/{user}/roles', [UserController::class, 'updateRoles'])->middleware(['auth',roleAdmin::class]);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth',hasCounty::class])->name('dashboard');

Route::get('/counties', [CountyController::class, 'index'])->middleware(['auth',roleAdmin::class])->name('counties.index');

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth',roleAdmin::class])->name('admin');

Route::resource('users', UserController::class)->middleware(['auth',roleAdmin::class]);

Route::get('/sbvoters/search', [SbVoterController::class, 'search'])->middleware('auth');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', hasCounty::class, isActive::class])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
