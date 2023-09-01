<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
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

Route::middleware('guest')->group(function () {
    Route::post('/login', LoginController::class);

    Route::prefix('/department')->name('department.')->group(function () {
        Route::get('/', [DepartmentController::class, 'index']);
        Route::post('/', [DepartmentController::class, 'store']);
        Route::post('/storeMany', [DepartmentController::class, 'storeMany']);
        Route::get('/{department:id}', [DepartmentController::class, 'show']);
    });
});
