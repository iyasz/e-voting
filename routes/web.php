<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\userController;
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
    return view('index');
});

Route::view('/auth/login', 'auth.login');
Route::post('/login', [authController::class, 'login']);

Route::get('/logout', [authController::class, 'logout']);

Route::resource('siswa', userController::class);
