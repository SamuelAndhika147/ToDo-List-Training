<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
Route::middleware('isGuest')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::get('register', [TodoController::class, 'registerPage'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login'])->name('login-baru');
});

Route::middleware('isLogin')->group(function () {
  Route::get('/home', function () { return view('home'); });
  Route::get('/create', [TodoController::class, 'create'])->name('create');
  Route::post('/store', [TodoController::class, 'store'])->name('store');
  Route::get('/data', [TodoController::class, 'data'])->name('data');
  Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
  Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
  Route::delete('/destroy/{id}', [TodoController::class, 'destroy'])->name('destroy');
  Route::patch('/complated/{id}', [TodoController::class, 'updateToComplated'])->name('update-complated');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


