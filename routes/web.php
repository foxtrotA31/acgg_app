<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\IrrigationLogController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\MoistureLogController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

    Route::resource('/my_plants', PlantController::class);
    Route::post('/get-plants-by-category', [PlantController::class, 'getPlantDetailsByCategory'])->name('plants.byCategory');

    Route::resource('/sensor_devices', SensorController::class);    
    Route::get('/search', [SensorController::class, 'search'])->name('search_devices.search');

    Route::get('/irrigation/logs/all', [IrrigationLogController::class, 'getAllLogs'])->name('getAllLogs');
    Route::post('/irrigation/startLog', [IrrigationLogController::class, 'startLog'])->name('startLog');
    Route::patch('/irrigation/endLog/{id}', [IrrigationLogController::class, 'endLog'])->name('endLog');
    Route::get('/irrigation/logs/{id}', [IrrigationLogController::class, 'getLogs'])->name('getLogs');
    

    
});

Route::middleware('guest')->group(function (){

    Route::view('/','landing.index')->name('landing');
    Route::view('/register','auth.register' )->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login','auth.login' )->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
});




 