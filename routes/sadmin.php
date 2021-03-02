<?php

use App\Http\Controllers\SAdminController;
use Illuminate\Support\Facades\Route;


// Route Configuration for super admin teams manager
Route::get('/super-admin/login', [SAdminController::class, 'login']);
Route::get('/super-admin/register', [SAdminController::class, 'register']);
Route::get('/super-admin/orgs/index', [SAdminController::class, 'indexOrgs'])->middleware('role')->name('sadmin-index');
Route::get('/super-admin/orgs/create', [SAdminController::class, 'createOrg'])->middleware('role')->name('sadmin.orgs.create');
Route::post('/super-admin/orgs', [SAdminController::class, 'storeOrg'])->name('sadmin.orgs.store');
Route::patch('/super-admin/orgs/{id}', [SAdminController::class, 'updateOrg'])->middleware('role');
Route::delete('/super-admin/orgs/delete/{id}', [SAdminController::class, 'deleteOrg'])->middleware('role');
