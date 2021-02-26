<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SAdminController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route Configuration for super admin teams manager
Route::get('/super-admin/login', [SAdminController::class, 'login']);
Route::get('/super-admin/register', [SAdminController::class, 'register']);
Route::get('/super-admin/orgs/index', [SAdminController::class, 'indexOrgs']);
Route::get('/super-admin/orgs/create', [SAdminController::class, 'createOrg']);
Route::post('/super-admin/orgs', [SAdminController::class, 'storeOrg']);
Route::patch('/super-admin/orgs/{id}', [SAdminController::class, 'updateOrg']);
Route::delete('/super-admin/orgs/delete/{id}', [SAdminController::class, 'deleteOrg']);
