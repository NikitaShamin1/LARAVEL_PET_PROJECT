<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Auth::routes();

Route::get('/', [Controllers\FilmController::class, 'index'])->name('home');

Route::group(['prefix' => 'films'], function() {
    Route::get('/', [Controllers\FilmController::class, 'index'])->name('film.index');
    Route::get('/create', [Controllers\FilmController::class, 'create'])->name('film.create');
    Route::get('/{film}', [Controllers\FilmController::class, 'show'])->name('film.show');
    Route::post('/', [Controllers\FilmController::class, 'store'])->name('film.store');
});

Route::group(['prefix' => 'user'], function() {
   Route::get('/{user}', [Controllers\UserController::class, 'index'])->name('user.index');
});

Route::group(['prefix' => 'review'], function() {
    Route::post('/', [Controllers\ReviewController::class, 'store'])->name('review.store');
});


