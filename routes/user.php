<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user/login', [UserController::class, 'login'])->name('user-login');
Route::get('/user/register', [UserController::class, 'register'])->name('user-register');
Route::post('/user/register/store', [UserController::class, 'registerStore'])->name('user-register-store');
Route::get('/user/dashboard/index', [UserController::class, 'indexCensus'])->name('user-index');
Route::get('/user/dashboard/create', [UserController::class, 'createCensus'])->name('user-create');
Route::post('/user/dashboard/create/store', [UserController::class, 'storeCensus'])->name('user-create-store');