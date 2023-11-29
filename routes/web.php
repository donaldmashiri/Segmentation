<?php

use Illuminate\Support\Facades\Route;

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


Route::get('auth/google', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });

    Route::middleware(['auth'])->group(function () {
        Route::middleware([
            'auth:sanctum',
            config('jetstream.auth_session'),
            'verified',
        ])->group(function () {
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        });

        Auth::routes();

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('customers', \App\Http\Controllers\CustomerController::class);
        Route::resource('transactions', \App\Http\Controllers\TransactionController::class);
        Route::resource('segment', \App\Http\Controllers\SegmentController::class);
        Route::resource('results', \App\Http\Controllers\ResultAnalysisController::class);
        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

    });
});

Route::get('/', function () {
    return view('welcome');
});


