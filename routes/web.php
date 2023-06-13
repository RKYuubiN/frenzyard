<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AgeRestrictionMiddleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [UserController::class,'show']);
Route::get('/register',[AuthController::class,'create']);
Route::post('/register',[AuthController::class,'register'])->name('register')->middleware(AgeRestrictionMiddleware::class);
Route::get('/login',[AuthController::class,'create']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/dashboard',[UserController::class,'show'])->name('dashboard');


Route::get('/test',[ExpenseController::class,'getTotalSum']);