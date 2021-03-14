<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user/register', [UserController::class, 'register'])->name('user-register');