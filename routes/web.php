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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('auth/google', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

        Route::resource('customers', \App\Http\Controllers\CustomerController::class);
        Route::resource('transactions', \App\Http\Controllers\TransactionController::class);
        Route::resource('segment', \App\Http\Controllers\SegmentController::class);
        Route::resource('results', \App\Http\Controllers\ResultAnalysisController::class);
        Route::resource('report', \App\Http\Controllers\ReportController::class);
        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
