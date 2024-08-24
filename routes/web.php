<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardadminController;

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

Route::prefix('auth')->group(function () {
    Route::get('login', [App\Http\Controllers\LoginController::class, 'show'])->name('login');
    Route::post('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return view('dashboardAdmin');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardadminController::class, 'index'])->name('dashboard');
Route::get('/dashboardadmin', [App\Http\Controllers\DashboardadminController::class, 'index'])->name('dashboardadmin');

Route::get('/alumniadmin', [App\Http\Controllers\AlumniadminController::class, 'index'])->name('alumniadmin');

Route::get('/importdata', [App\Http\Controllers\ImportController::class, 'index'])->name('importdata');
Route::post('/import', [App\Http\Controllers\ImportController::class, 'import'])->name('import');

Route::get('/tambahdataperusahaan', [App\Http\Controllers\TambahDataPerusahaanController::class, 'index'])->name('tambahdataperusahaan');
Route::post('/tambahdataperusahaan', [App\Http\Controllers\TambahDataperusahaanController::class, 'store'])->name('tambahdataperusahaan');


Route::get('/dataperusahaan', [App\Http\Controllers\DataPerusahaanController::class, 'index'])->name('dataperusahaan');







