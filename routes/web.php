<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruBkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KerawananController;
use App\Http\Controllers\PetaKerawananController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WalasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('users.home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin|guru_bk|wali_kelas'
])->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruBkController::class);
    Route::resource('walas', WalasController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('kerawanan', KerawananController::class);
    Route::resource('peta-kerawanan', PetaKerawananController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:guru_bk|wali_kelas|siswa'
])->group(function () {
    Route::get('/home', function () {
        return view('users.index');
    })->name('home');
    Route::get('/siswas', function () {
        return view('users.siswa');
    });
    
    Route::get('/private-view', function () {
        return view('users.view-private');
    });
    Route::get('/study-view', function () {
        return view('users.view-study');
    });
    Route::get('/career-view', function () {
        return view('users.view-career');
    });
    Route::get('/social-view', function () {
        return view('users.view-social');
    });
    
    Route::get('/signin', function () {
        return view('signin');
    });
    
});