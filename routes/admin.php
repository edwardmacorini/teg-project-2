<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// General Routes
Route::get('/admin/login', [AdminController::class, 'login']);

// Census Routes
Route::get('/admin/census/index', [AdminController::class, 'censusIndex'])->name('admin-census-index');

// Route Configuration for oadmin manager

// Route::get('/admin/dashboard/index', [SAdminController::class, 'indexOrgs'])->middleware('role')->name('sadmin-index');
// Route::get('/admin/dashboard/create', [SAdminController::class, 'createOrg'])->middleware('role')->name('sadmin.orgs.create');
