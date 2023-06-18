<?php

use App\Http\Controllers\AuthController;
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

Route::get('/siswa', [AuthController::class, 'index']);

Route::get('/qoutess/{id}', [AuthController::class, 'qoutes']);

Route::get('/qoutess2', [AuthController::class, 'qoutes2']);

Route::get('/history/{id}', [AuthController::class, 'history']);

Route::get('/siswa/{id}', [AuthController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
