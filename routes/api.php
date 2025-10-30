<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Rute API yang dikelola oleh aplikasi kamu. Rute publik tidak membutuhkan
| autentikasi, sementara rute dalam grup "auth:sanctum" membutuhkan token.
|
*/

//  Rute Publik
Route::post('/login', [AuthController::class, 'login']);

//  Rute Privat
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // CRUD untuk StudentController (otomatis: index, store, show, update, destroy)
    Route::apiResource('students', StudentController::class);
});
