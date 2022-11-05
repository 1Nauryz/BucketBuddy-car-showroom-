<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\CategoryController;

Route::get('/', function (){
   return redirect()->route('cars.index');
});

Route::middleware('hasrole:editor')->group(function (){

});
Route::middleware('auth')->group(function (){
    Route::resource('cars', CarController::class)->except('index', 'show');
    Route::resource('comments', CommentController::class)->only('store', 'destroy');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin,editor')->group(function (){
        Route::get('/users',[UserController::class, 'index'])->name('users.index');
        Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
//        Route::get('/adm/cars',[UserController::class, 'showCars'])->name('adm.cars');
    });
    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin')->group(function () {
        Route::put('/uesrs/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
        Route::put('/uesrs/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::delete('/categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
});

Route::resource('cars', CarController::class)->only('index', 'show');

Route::resource('comments', CommentController::class)->except('store', 'destroy');


Route::get('/cars/category/{category}', [CarController::class, 'carsByCat'])->name('cars.category')->middleware('hasrole:editor');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register.form');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');

