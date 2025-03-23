<?php

use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PercentController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

// Auth
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::middleware([AdminAuth::class])->group(function () {
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('logout');
});

// User
Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin/users', [UserController::class,'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class,'create'])->name('admin.users.create');
    Route::post('/admin/users/create', [UserController::class,'store']);
    Route::get('/admin/users/update/{user}', [UserController::class,'edit'])->name('admin.users.update');
    Route::post('/admin/users/update/{user}', [UserController::class,'update']);
    Route::delete('/admin/users/delete/{user}', [UserController::class,'destroy'])->name('admin.users.delete');
});

// Cards
Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin/cards', [CardController::class, 'index'])->name('admin.cards.index');
    Route::get('/admin/cards/create', [CardController::class,'create'])->name('admin.cards.create');
    Route::post('admin/cards/create', [CardController::class, 'store']);
    Route::get('/admin/cards/update/{card}', [CardController::class,'edit'])->name('admin.cards.update');
    Route::post('/admin/cards/update/{card}', [CardController::class,'update']);
    Route::delete('/admin/cards/delete/{card}', [CardController::class,'destroy'])->name('admin.cards.delete');
});

// Reviews
Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
    Route::get('/admin/reviews/create', [ReviewController::class,'create'])->name('admin.reviews.create');
    Route::post('admin/reviews/create', [ReviewController::class, 'store']);
    Route::get('/admin/reviews/update/{review}', [ReviewController::class,'edit'])->name('admin.reviews.update');
    Route::post('/admin/reviews/update/{review}', [ReviewController::class,'update']);
    Route::delete('/admin/reviews/delete/{review}', [ReviewController::class,'destroy'])->name('admin.reviews.delete');
});

// Percent
Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin/percent', [PercentController::class, 'index'])->name('admin.percent.index');
    Route::post('/admin/percent', [PercentController::class, 'store'])->name('admin.percent.create');
    Route::post('/admin/percent/update/{percent}', [PercentController::class, 'update'])->name('admin.percent.update');
});
