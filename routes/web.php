<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

    Route::resource('/my_plants', PlantController::class);
    
});

Route::middleware('guest')->group(function (){

    Route::view('/','landing.index')->name('landing');
    Route::view('/register','auth.register' )->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login','auth.login' )->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
});




 