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
use App\Models\quotes;
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

Route::get('/', [QuotesController::class, 'show'])->name('home.show');


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


    Route::get('layanan/bimbingan-konseling', [KonselingBKController::class, 'indexBimbingan'])->name('layanan-bk');
    
    // bimbingan pribadi
    Route::get('layanan/bimbingan-pribadi/jadwal', [KonselingBKController::class, 'indexBimbingan'])->name('pribadi-pending-index');
    Route::get('layanan/bimbingan-pribadi/accept', [KonselingBKController::class, 'indexBimbingan'])->name('pribadi-accept-index');
    Route::get('layanan/bimbingan-pribadi/reschedule', [KonselingBKController::class, 'indexBimbingan'])->name('pribadi-reschedule-index');
    Route::get('layanan/bimbingan-pribadi/cancel', [KonselingBKController::class, 'indexBimbingan'])->name('pribadi-cancel-index');
    Route::get('layanan/bimbingan-pribadi/done', [KonselingBKController::class, 'indexBimbingan'])->name('pribadi-done-index');
    Route::post('layanan/bimbingan-pribadi/menambah', [KonselingBKController::class, 'store']);
    Route::put('layanan/bimbingan-pribadi/acc/{id}', [KonselingBKController::class, 'acc'])->name('pribadi-acc');
    Route::put('layanan/bimbingan-pribadi/reschedule', [KonselingBKController::class, 'edit'])->name('pribadi-edit-schedule');
    Route::put('layanan/bimbingan-pribadi/reschedule/{id}', [KonselingBKController::class, 'reschedule'])->name('pribadi-reschedule');
    Route::put('layanan/bimbingan-pribadi/reject/{id}', [KonselingBKController::class, 'reject'])->name('pribadi-reject');
    Route::put('layanan/bimbingan-pribadi/done/{id}', [KonselingBKController::class, 'done'])->name('pribadi-done');
    Route::get('layanan/tambah/bimbingan-pribadi', [KonselingBKController::class, 'create'])->name('pribadi-addschedule');
    
    // bimbingan sosial 
    Route::get('layanan/bimbingan-sosial/jadwal', [KonselingBKController::class, 'indexBimbingan'])->name('sosial-pending-index');
    Route::get('layanan/bimbingan-sosial/accept', [KonselingBKController::class, 'indexBimbingan'])->name('sosial-accept-index');
    Route::get('layanan/bimbingan-sosial/reschedule', [KonselingBKController::class, 'indexBimbingan'])->name('sosial-reschedule-index');
    Route::get('layanan/bimbingan-sosial/cancel', [KonselingBKController::class, 'indexBimbingan'])->name('sosial-cancel-index');
    Route::get('layanan/bimbingan-sosial/done', [KonselingBKController::class, 'indexBimbingan'])->name('sosial-done-index');
    Route::post('layanan/bimbingan-sosial/menambah', [KonselingBKController::class, 'store']);
    Route::put('layanan/bimbingan-sosial/acc/{id}', [KonselingBKController::class, 'acc'])->name('sosial-acc');
    Route::put('layanan/bimbingan-sosial/reschedule', [KonselingBKController::class, 'edit'])->name('sosial-edit-schedule');
    Route::put('layanan/bimbingan-sosial/reschedule/{id}', [KonselingBKController::class, 'reschedule'])->name('sosial-reschedule');
    Route::put('layanan/bimbingan-sosial/reject/{id}', [KonselingBKController::class, 'reject'])->name('sosial-reject');
    Route::put('layanan/bimbingan-sosial/done/{id}', [KonselingBKController::class, 'done'])->name('sosial-done');
    Route::get('layanan/tambah/bimbingan-sosial', [KonselingBKController::class, 'create'])->name('sosial-addschedule');

    // bimbingan karir 
    Route::get('layanan/bimbingan-karir/jadwal', [KonselingBKController::class, 'indexBimbingan'])->name('karir-pending-index');
    Route::get('layanan/bimbingan-karir/accept', [KonselingBKController::class, 'indexBimbingan'])->name('karir-accept-index');
    Route::get('layanan/bimbingan-karir/reschedule', [KonselingBKController::class, 'indexBimbingan'])->name('karir-reschedule-index');
    Route::get('layanan/bimbingan-karir/cancel', [KonselingBKController::class, 'indexBimbingan'])->name('karir-cancel-index');
    Route::get('layanan/bimbingan-karir/done', [KonselingBKController::class, 'indexBimbingan'])->name('karir-done-index');
    Route::post('layanan/bimbingan-karir/menambah', [KonselingBKController::class, 'store']);
    Route::put('layanan/bimbingan-karir/acc/{id}', [KonselingBKController::class, 'acc'])->name('karir-acc');
    Route::put('layanan/bimbingan-karir/reschedule', [KonselingBKController::class, 'edit'])->name('karir-edit-schedule');
    Route::put('layanan/bimbingan-karir/reschedule/{id}', [KonselingBKController::class, 'reschedule'])->name('karir-reschedule');
    Route::put('layanan/bimbingan-karir/reject/{id}', [KonselingBKController::class, 'reject'])->name('karir-reject');
    Route::put('layanan/bimbingan-karir/done/{id}', [KonselingBKController::class, 'done'])->name('karir-done');
    Route::get('layanan/tambah/bimbingan-karir', [KonselingBKController::class, 'create'])->name('karir-addschedule');

    // bimbingan belajar 
    Route::get('layanan/bimbingan-belajar/jadwal', [KonselingBKController::class, 'indexBimbingan'])->name('belajar-pending-index');
    Route::get('layanan/bimbingan-belajar/accept', [KonselingBKController::class, 'indexBimbingan'])->name('belajar-accept-index');
    Route::get('layanan/bimbingan-belajar/reschedule', [KonselingBKController::class, 'indexBimbingan'])->name('belajar-reschedule-index');
    Route::get('layanan/bimbingan-belajar/cancel', [KonselingBKController::class, 'indexBimbingan'])->name('belajar-cancel-index');
    Route::get('layanan/bimbingan-belajar/done', [KonselingBKController::class, 'indexBimbingan'])->name('belajar-done-index');
    Route::post('layanan/bimbingan-belajar/menambah', [KonselingBKController::class, 'store']);
    Route::put('layanan/bimbingan-belajar/acc/{id}', [KonselingBKController::class, 'acc'])->name('belajar-acc');
    Route::put('layanan/bimbingan-belajar/reschedule', [KonselingBKController::class, 'edit'])->name('belajar-edit-schedule');
    Route::put('layanan/bimbingan-belajar/reschedule/{id}', [KonselingBKController::class, 'reschedule'])->name('belajar-reschedule');
    Route::put('layanan/bimbingan-belajar/reject/{id}', [KonselingBKController::class, 'reject'])->name('belajar-reject');
    Route::put('layanan/bimbingan-belajar/done/{id}', [KonselingBKController::class, 'done'])->name('belajar-done');
    Route::get('layanan/tambah/bimbingan-belajar', [KonselingBKController::class, 'create'])->name('belajar-addschedule');

    // Route::get('layanan/bimbingan-sosial/jadwal', [KonselingBKController::class, 'indexBimbingan'])->name('sosial-pending-index');
    // Route::get('layanan/bimbingan-sosial/accept', [KonselingBKController::class, 'indexBimbinganSosial'])->name('sosial-accept-index');
    // Route::get('layanan/bimbingan-sosial/reschedule', [KonselingBKController::class, 'indexBimbinganSosial'])->name('sosial-reschedule-index');
    // Route::get('layanan/bimbingan-sosial/cancel', [KonselingBKController::class, 'indexBimbinganSosial'])->name('sosial-cancel-index');

    Route::get('layanan/tambah/bimbingan-karir', [KonselingBKController::class, 'create'])->name('karir-addschedule');
    Route::resource('peta-kerawanan', PetaKerawananController::class);
    Route::resource('quotes', QuotesController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:guru_bk|wali_kelas|siswa'
])->group(function () {
    Route::get('bimbingan-konseling', [KonselingBKController::class, 'indexBimbingan'])->name('layanan-siswa');
    Route::get('bimbingan-konseling/pribadi', [KonselingBKController::class, 'indexBimbingan'])->name('pribadi-siswa');
    Route::get('bimbingan-konseling/study', [KonselingBKController::class, 'indexBimbingan'])->name('study-siswa');
    Route::get('bimbingan-konseling/social', [KonselingBKController::class, 'indexBimbingan'])->name('social-siswa');
    Route::get('bimbingan-konseling/career', [KonselingBKController::class, 'indexBimbingan'])->name('career-siswa');
    Route::post('bimbingan-konseling/pribadi/add', [KonselingBKController::class, 'storeSiswa'])->name('add-siswa');
    Route::resource('quotes', QuotesController::class);
    Route::resource('surat-pemanggilan', PemanggilanController::class);

    Route::get('/home', function () {
        return view('users.siswa');
    })->name('home');
    
    Route::get('/signin', function () {
        return view('signin');
    });
    
});
