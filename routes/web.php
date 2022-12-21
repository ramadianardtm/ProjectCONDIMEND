<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoadController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('login', fn () => view('login'))->name('login-form');
Route::get('register', fn () => view('register'))->name('register-form');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('map', [LoadController::class, 'getparkir'])->name('map.map');
Route::get('detail/{id}', [LoadController::class, 'parkirdetail'])->name('map.detail');
Route::get('reservasi/{id}', [LoadController::class, 'doreservasi'])->name('map.reservasi');
Route::post('reservasi/{id}', [AuthController::class, 'createreservasi'])->name('map.reservasi');


Route::prefix('pengelola')->group(function () {
    Route::get('regparkir', [LoadController::class, 'regtempatparkir'])->name('pengelola.regparkir');
    Route::post('regparkir', [AuthController::class, 'doregistertempatparkir'])->name('pengelola.regparkir');
    Route::get('/dashboard', [LoadController::class, 'getdashboardpengelola'])->name('pengelola.dashboard')->middleware('pengelolaonly');
    Route::post('/dashboard', [CrudController::class, 'pengelolaupdatestatus'])->name('pengelola.update')->middleware('pengelolaonly');
    Route::get('/rekap', [LoadController::class, 'getrekappengelola'])->name('pengelola.rekap')->middleware('pengelolaonly');
    Route::get('/info', [LoadController::class, 'pengelolainfo'])->name('pengelola.info')->middleware('pengelolaonly');
    Route::get('/profile', [LoadController::class, 'updateprofilepengelola'])->name('pengelola.profile')->middleware('pengelolaonly');
    Route::post('/profile', [CrudController::class, 'doupdateprofilepengelola'])->name('user.info')->middleware('pengelolaonly');
    Route::post('/info', [CrudController::class, 'doupdateparkir'])->name('pengelola.info')->middleware('pengelolaonly');
});

Route::prefix('admin')->group(function () {
    Route::get('/analytics', [LoadController::class, 'admingetanalytics'])->name('admin.analytics')->middleware('adminonly');
    Route::get('/transaksi', [LoadController::class, 'admingettransaksi'])->name('admin.transaksi')->middleware('adminonly');
    Route::post('/transaksi', [CrudController::class, 'adminbatalkanreservasi'])->name('admin.selesai');
    Route::get('/riwayat', [LoadController::class, 'admingetriwayat'])->name('admin.riwayat')->middleware('adminonly');
    Route::get('/user', [LoadController::class, 'admingetuser'])->name('admin.user')->middleware('adminonly');
    Route::get('/pengelola', [LoadController::class, 'admingetpengelola'])->name('admin.pengelola')->middleware('adminonly');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::prefix('user')->group(function () {
        Route::get('/', fn () => redirect()->route('user.search'))->name('user.index');
        Route::get('/search', [LoadController::class, 'usergetreservasi'])->name('user.search');
        Route::post('/search', [CrudController::class, 'userselesaikanreservasi'])->name('user.selesaikan');
        Route::get('/history', [LoadController::class, 'usergethistory'])->name('user.history');
        Route::get('/info', [LoadController::class, 'updateprofilepage'])->name('user.info')->middleware('logedonly');
        Route::post('/info', [CrudController::class, 'doupdateprofile'])->name('user.info')->middleware('logedonly');
    });
});
