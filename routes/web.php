<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('auth#login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth#logout');

Route::prefix('item')->group(function () {
    Route::get('/index', [ItemController::class, 'show'])->name('item#index');
});

Route::prefix('category')->group(function () {
    Route::get('/index', [CategoryController::class, 'show'])->name('category#index');
    Route::get('/createPage', [CategoryController::class, 'createPage'])->name('category#createPage');
    Route::post('/create', [CategoryController::class, 'store'])->name('category#store');
});
