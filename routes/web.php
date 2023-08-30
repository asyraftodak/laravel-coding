<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    return 'Welcome to Hadir';
});

Route::post('/users', function (Request $request) {

    return User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Str::random(10),
    ]);
})->middleware('role:admin');
