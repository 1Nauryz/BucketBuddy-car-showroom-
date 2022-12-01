<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\CategoryController;
use App\Http\Controllers\LangController;


Route::get('/', function (){
    return redirect()->route('cars.index');
});

Route::get('lang/{lang}', [LangController::class, 'switchLang'])->name('switch.lang');

Route::middleware('auth')->group(function (){
    Route::resource('cars', CarController::class)->except('index', 'show');
    Route::resource('comments', CommentController::class)->only('store', 'destroy');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/cars/{car}/rate', [CarController::class, 'rate'])->name('cars.rate');
    Route::post('/cars/{car}/favorite', [CarController::class, 'favorites'])->name('cars.favorites');
    Route::post('/cars/{car}/unfavorite', [CarController::class, 'unfavorites'])->name('cars.unfavorites');
    Route::post('/cars/{car}/unrate', [CarController::class, 'unrate'])->name('cars.unrate');
    Route::get('cars/favorites', [CarController::class, 'showFav'])->name('cars.showfav');
    Route::post('cars/message/{car}', [CarController::class, 'message'])->name('cars.message');
    Route::post('/cars/{car}/destroymessage', [CarController::class, 'dmessage'])->name('cars.deletemessage');

    Route::get('cars/{car}/message', [CarController::class, 'showMessage'])->name('cars.showmessage');


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

Route::get('/cars/category/{category}', [CarController::class, 'carsByCat'])->name('cars.category');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register.form');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');

