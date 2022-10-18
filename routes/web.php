<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth2\RegisterController;

Route::get('/', function (){
   return redirect()->route('cars.index');
});

Route::middleware('auth')->group(function (){
    Route::resource('cars', CarController::class)->except('index', 'show');
    Route::resource('comments', CommentController::class)->only('store', 'destroy');
});

Route::resource('cars', CarController::class)->only('index', 'show');

Route::resource('comments', CommentController::class)->except('store', 'destroy');


Route::get('/cars/category/{category}', [CarController::class, 'carsByCat'])->name('cars.category');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register.form');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
