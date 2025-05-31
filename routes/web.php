<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
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



Route::get('/', [AdminController::class, 'index'])->name('dashboard');

//sesi
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'loginProcess'])->name('login.process');
Route::get('/register', [SessionController::class, 'register'])->name('register');
Route::post('/register', [SessionController::class, 'registerProcess'])->name('register.process');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

//user
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');


//event
Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/update/{id}', [EventController::class, 'update'])->name('events.update');
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/store', [EventController::class, 'store'])->name('events.store');
    Route::delete('/destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::prefix('bukus')->group(function () {
    Route::get('/', [BukuController::class, 'index'])->name('bukus.index');
    Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('bukus.edit');
    Route::put('/update/{id}', [BukuController::class, 'update'])->name('bukus.update');
    Route::get('/create', [BukuController::class, 'create'])->name('bukus.create');
    Route::post('/store', [BukuController::class, 'store'])->name('bukus.store');
    Route::delete('/destroy/{id}', [BukuController::class, 'destroy'])->name('bukus.destroy');
});
