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

Route::get('/logout', [LoadController::class, 'logout']);

Route::get('login', fn () => view('login'))->name('login-form');
Route::get('register', fn () => view('register'))->name('register-form');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::prefix('pengelola')->group(function () {
    Route::get('/add-product', [LoadController::class, 'regproduct'])->name('pengelola.regparkir')->middleware('pengelolaonly');
    Route::post('/add-product', [AuthController::class, 'doregisterproduct'])->name('pengelola.regparkir')->middleware('pengelolaonly');
    Route::get('/trainer', [LoadController::class, 'trainer'])->name('pengelola.trainer')->middleware('pengelolaonly');
    Route::post('/trainer', [AuthController::class, 'registertrainer'])->name('pengelola.regtrainer')->middleware('pengelolaonly');
    Route::get('/manage-product', [LoadController::class, 'manageproduct'])->name('pengelola.product')->middleware('pengelolaonly');
    Route::get('edit/{id}', [LoadController::class, 'editproduct'])->middleware('pengelolaonly');
    Route::post('edit/{id}', [CrudController::class, 'updateproduct'])->middleware('pengelolaonly');
    Route::get('remove/{id}', [LoadController::class, 'deleteproduct'])->middleware('pengelolaonly');

    Route::get('/dashboard', [LoadController::class, 'getuserorder'])->name('pengelola.dashboard')->middleware('pengelolaonly');
    Route::post('/dashboard', [CrudController::class, 'pengelolaupdate'])->name('pengelola.update');
    Route::post('/rekap', [CrudController::class, 'pengelolatopup'])->name('pengelola.topup');
    Route::get('/rekap', [LoadController::class, 'getrekappengelola'])->name('pengelola.rekap')->middleware('pengelolaonly');
    Route::get('/info', [LoadController::class, 'pengelolainfo'])->name('pengelola.info')->middleware('pengelolaonly');
    Route::get('/profile', [LoadController::class, 'updateprofilepengelola'])->name('pengelola.profile')->middleware('pengelolaonly');
    Route::post('/profile', [CrudController::class, 'doupdateprofilepengelola'])->name('user.info')->middleware('pengelolaonly');
    Route::post('/info', [CrudController::class, 'doupdateparkir'])->name('pengelola.info')->middleware('pengelolaonly');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::prefix('user')->group(function () {
        Route::get('/', fn () => redirect()->route('user.search'))->name('user.index');
        Route::get('/homepage', [LoadController::class, 'usergethome'])->name('user.homepage')->middleware('logedonly');
        Route::get('/search', [LoadController::class, 'usergetreservasi'])->name('user.search');
        Route::get('/myorder', [LoadController::class, 'usergetorder'])->name('user.order');
        Route::get('/product', [LoadController::class, 'getproduct'])->name('user.product');
        Route::get('/detail/{id}', [LoadController::class, 'detailproduct'])->middleware('logedonly');
        Route::post('/detail/{id}', [CrudController::class, 'booknow'])->middleware('logedonly');

        Route::post('/myorder', [CrudController::class, 'orderselesai'])->name('user.update');
        Route::post('/homepage', [CrudController::class, 'usertopup'])->name('user.topup');
        Route::get('/history', [LoadController::class, 'usergethistory'])->name('user.history')->middleware('logedonly');
        Route::get('/info', [LoadController::class, 'updateprofilepage'])->name('user.info')->middleware('logedonly');
        Route::post('/info', [CrudController::class, 'doupdateprofile'])->name('user.info')->middleware('logedonly');
    });
});
