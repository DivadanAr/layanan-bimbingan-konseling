<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruBkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KerawananController;
use App\Http\Controllers\KonselingBKController;
use App\Http\Controllers\PemanggilanController;
use App\Http\Controllers\PetaKerawananController;
use App\Http\Controllers\QuotesController;
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

Route::post('export-petakerawanan', [PetaKerawananController::class, 'export'])->name('export-excel');
Route::get('create-pdf-file/{id}', [PemanggilanController::class, 'exportpdf'])->name('export-pdf');

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
    Route::resource('pemanggilan', PemanggilanController::class);


    // bimbingan pribadi
    Route::get('layanan/bimbingan-pribadi/jadwal', [KonselingBKController::class, 'indexBimbinganPribadi'])->name('pribadi-pending-index');
    Route::get('layanan/bimbingan-pribadi/accept', [KonselingBKController::class, 'indexBimbinganPribadi'])->name('pribadi-accept-index');
    Route::get('layanan/bimbingan-pribadi/reschedule', [KonselingBKController::class, 'indexBimbinganPribadi'])->name('pribadi-reschedule-index');
    Route::get('layanan/bimbingan-pribadi/cancel', [KonselingBKController::class, 'indexBimbinganPribadi'])->name('pribadi-cancel-index');
    Route::post('layanan/bimbingan-pribadi/menambah', [KonselingBKController::class, 'store']);
    Route::put('layanan/bimbingan-pribadi/acc/{id}', [KonselingBKController::class, 'acc'])->name('pribadi-acc');
    Route::put('layanan/bimbingan-pribadi/reschedule', [KonselingBKController::class, 'edit'])->name('pribadi-edit-schedule');
    Route::put('layanan/bimbingan-pribadi/reschedule/{id}', [KonselingBKController::class, 'reschedule'])->name('pribadi-reschedule');
    Route::put('layanan/bimbingan-pribadi/reject/{id}', [KonselingBKController::class, 'reject'])->name('pribadi-reject');
    
    // bimbingan sosial 
    Route::get('layanan/bimbingan-sosial/jadwal', [KonselingBKController::class, 'indexBimbinganSosial'])->name('sosial-pending-index');
    Route::get('layanan/bimbingan-sosial/accept', [KonselingBKController::class, 'indexBimbinganSosial'])->name('sosial-accept-index');
    Route::get('layanan/bimbingan-sosial/reschedule', [KonselingBKController::class, 'indexBimbinganSosial'])->name('sosial-reschedule-index');
    Route::get('layanan/bimbingan-sosial/cancel', [KonselingBKController::class, 'indexBimbinganSosial'])->name('sosial-cancel-index');

    Route::get('layanan/tambah/bimbingan-pribadi', [KonselingBKController::class, 'createBimbinganPribadi'])->name('pribadi-addschedule');
    Route::get('layanan/tambah/bimbingan-sosial', [KonselingBKController::class, 'createBimbinganSosial']);
    Route::resource('peta-kerawanan', PetaKerawananController::class);
    Route::resource('quotes', QuotesController::class);
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
