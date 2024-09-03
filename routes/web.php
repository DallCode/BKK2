<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatalokerController;
use App\Http\Controllers\DashboardadminController;
use App\Http\Controllers\DashboardperusahaanController;

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

// Login Route
Route::prefix('auth')->group(function () {
    Route::get('login', [App\Http\Controllers\LoginController::class, 'show'])->name('login');
    Route::post('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    // return view('dashboardAdmin');
    return view('auth/login');
});


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HalamanController::class, 'index'])->name('dashboard');

// Route for Admin Role
// Dashboard Admin Route
Route::get('/dashboardadmin', [App\Http\Controllers\DashboardadminController::class, 'index'])->name('dashboardadmin');
// Alumni in Admin Route
Route::get('/alumniadmin', [App\Http\Controllers\AlumniadminController::class, 'index'])->name('alumniadmin');
Route::put('/alumni/{nik}', [App\Http\Controllers\AlumniadminController::class, 'update'])->name('alumni.update');
// Route for Import
Route::get('/importdata', [App\Http\Controllers\ImportController::class, 'index'])->name('importdata');
Route::post('/import', [App\Http\Controllers\ImportController::class, 'import'])->name('import');
// Route for Tambah Data Perusahaan in Admin
Route::get('/tambahdataperusahaan', [App\Http\Controllers\TambahDataPerusahaanController::class, 'index'])->name('tambahdataperusahaan');
Route::post('/tambahdataperusahaan', [App\Http\Controllers\TambahDataperusahaanController::class, 'store'])->name('tambahdataperusahaan');
// Route for View Data Perusahaan in Admin
Route::get('/dataperusahaan', [App\Http\Controllers\DataPerusahaanController::class, 'index'])->name('perusahaan.index');
Route::put('/perusahaan/update/{id_data_perusahaan}', [App\Http\Controllers\DataPerusahaanController::class, 'update'])->name('perusahaan.update');
// Route for Akun Pengguna
Route::get('/akunpengguna', [App\Http\Controllers\AkunpenggunaController::class, 'index'])->name('akunpengguna');
// Rute for Loker in Admin
Route::get('/lokeradmin', [App\Http\Controllers\AjuanlokerController::class, 'index'])->name('lokeradmin');
Route::put('/loker/{id_lowongan_pekerjaan}/update-status', [App\Http\Controllers\AjuanlokerController::class, 'updateStatus'])->name('update.status');
// Route For Laporan
Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');


// Route for Perusahaan Role
// Route for Dashboard Perusahaan
Route::get('/dashboardperusahaan', [App\Http\Controllers\DashboardperusahaanController::class, 'index'])->name('dashboardperusahaan');
// Route for Data Loker in Perusahaan
Route::get('/dataloker', [App\Http\Controllers\DatalokerController::class, 'index'])->name('dataloker');
Route::get('/lowongan/{id_lowongan_pekerjaan}', [DatalokerController::class, 'show'])->name('lowongan.show');
Route::post('/lowongan/store', [DatalokerController::class, 'store'])->name('lowongan.store');
Route::get('/lowongan', [DatalokerController::class, 'index'])->name('lowongan.index');
Route::put('/lowongan/{id_lowongan_pekerjaan}', [DatalokerController::class, 'update'])->name('lowongan.update');



// Route for Alumni Role
// Route for Dashboard Alumni
Route::get('/dashboardalumni', [App\Http\Controllers\DashboardalumniController::class, 'index'])->name('dashboardalumni');

// Route untuk Chart
// Route::get('/statistics', [App\Http\Controllers\StatisticsController::class, 'index']);









