<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerifyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
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

Route::post('/login', LoginController::class);
Route::post('/verify', VerifyController::class);

Route::prefix('/department')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/', [DepartmentController::class, 'store']);
    Route::post('/storeMany', [DepartmentController::class, 'storeMany']);
    Route::get('/{department:id}', [DepartmentController::class, 'show']);
});

Route::prefix('/profile')->group(function () {
    Route::get('/{profile:id}', [ProfileController::class, 'show']);
    Route::post('/', [ProfileController::class, 'store']);
    Route::put('/{profile:id}', [ProfileController::class, 'update']);
});
