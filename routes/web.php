<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/reports', [ReportController::class, 'index']);
    Route::get('/all-clients', [ClientController::class, 'getAllClient']);
    Route::get('/all-clients', [ClientController::class, 'getAllClient']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::resource('/client', ClientController::class);
    Route::post('/client/{client}/homeloan', [LoanController::class, 'updateOrCreateHome']);
    Route::post('/client/{client}/cashloan', [LoanController::class, 'updateOrCreateCash']);
});
