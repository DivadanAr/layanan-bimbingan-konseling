<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('auth/register', [AuthController::class, 'register']);

Route::post('auth/login', [AuthController::class, 'Login']);

Route::middleware('jwt.verify')->get('/siswa', [AuthController::class, 'index']);

Route::get('/quotes', [AuthController::class, 'quotes']);

Route::get('/history/{id}', [AuthController::class, 'history']);

Route::get('/schedule/{id}', [AuthController::class, 'schedule']);

Route::get('/siswa/{id}', [AuthController::class, 'show']);

Route::get('/kelas', [AuthController::class, 'showKelas']);

Route::post('/konseling', [AuthController::class, 'siswaStore']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
