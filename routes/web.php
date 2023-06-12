<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class,'create']);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/login',function(){
    return 'login';
})->name('login');
Route::get('/dashboard',function(){
    return 'dashboard';
})->name('dashboard');
