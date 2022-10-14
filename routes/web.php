<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function (){
   return redirect()->route('cars.index');
});

Route::resource('cars', CarController::class);
//Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
//Route::get('/cars/by/{id}', [CarController::class, 'show'])->name('cars.show');
//Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
//Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
