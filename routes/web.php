<?php

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardGaleriController;
use App\Http\Controllers\DashboardPaketController;
use App\Http\Controllers\DashboardPemanduanController;
use App\Http\Controllers\DashboardPemanduController;
use App\Http\Controllers\DashboardPengumumanController;
use App\Http\Controllers\DashboardReservasiController;
use App\Http\Controllers\DashboardUmkmController;
use App\Http\Controllers\DashboardWisataController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LoginController;
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

// Route Landingpage
Route::get('/', [LandingpageController::class, 'index']);
Route::get('/artikel', [LandingpageController::class, 'artikel']);
Route::get('/artikel/detail/{slug}', [LandingpageController::class, 'detail_artikel']);
Route::get('/wisata', [LandingpageController::class, 'wisata']);
Route::get('/wisata/detail/{slug}', [LandingpageController::class, 'detail_wisata']);
Route::get('/paket', [LandingpageController::class, 'paket']);
Route::get('/reservasi', [LandingpageController::class, 'reservasi']);
Route::get('/reservasi/bukti', [LandingpageController::class, 'store']);
Route::post('/reservasi/store', [LandingpageController::class, 'store']);
Route::get('/galeri', [LandingpageController::class, 'galeri']);
Route::get('/umkm', [LandingpageController::class, 'umkm']);
Route::get('/umkm/detail/{slug}', [LandingpageController::class, 'detail_umkm']);
Route::get('/pengumuman', [LandingpageController::class, 'pengumuman']);
Route::get('/pengumuman/detail/{slug}', [LandingpageController::class, 'detail_pengumuman']);
Route::get('/tentangkami/sejarah', [LandingpageController::class, 'sejarah']);
Route::get('/tentangkami/kontak', [LandingpageController::class, 'kontak']);

// Route Dashboard Admin
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/pemanduan/create/{id}', [DashboardPemanduanController::class, 'create'])->middleware('auth');

Route::get('/dashboard/artikel/checkSlug', [DashboardArtikelController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/pengumuman/checkSlug', [DashboardPengumumanController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/wisata/checkSlug', [DashboardWisataController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/paket/checkSlug', [DashboardPaketController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/umkm/checkSlug', [DashboardUmkmController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/artikel', DashboardArtikelController::class)->middleware('auth');
Route::resource('/dashboard/pengumuman', DashboardPengumumanController::class)->middleware('auth');
Route::resource('/dashboard/pemandu', DashboardPemanduController::class)->middleware('auth');
Route::resource('/dashboard/pemanduan', DashboardPemanduanController::class)->middleware('auth');
Route::resource('/dashboard/reservasi', DashboardReservasiController::class)->middleware('auth');
Route::resource('/dashboard/wisata', DashboardWisataController::class)->middleware('auth');
Route::resource('/dashboard/paket', DashboardPaketController::class)->middleware('auth');
Route::resource('/dashboard/umkm', DashboardUmkmController::class)->middleware('auth');
Route::resource('/dashboard/galeri', DashboardGaleriController::class)->middleware('auth');
Route::resource('/dashboard/admin', DashboardAdminController::class)->middleware('auth');
