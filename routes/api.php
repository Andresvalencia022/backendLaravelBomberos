<?php


use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\WinningticketController;
use App\Http\Controllers\API\UserController;

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::post('/createuser', [LoginController::class, 'check_in']);
Route::post('/login', [LoginController::class, 'login']);


// Rutas privadas con autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/authentication', [LoginController::class, 'handle_authentication']);
    
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/event', EventController::class);
    Route::apiResource('/news', NewsController::class);
    Route::apiResource('/Winningticket', WinningticketController::class);
});

//públicos
Route::prefix('/public')->group( function(){
    //Eventos
    Route::get('/event', [EventController::class, 'publicEvent']);
    Route::get('/event/{id}', [EventController::class, 'showPublicEvent']);
    //Noticias
    Route::get('/news', [NewsController::class, 'publicNews']);
    Route::get('/news/{id}', [NewsController::class, 'showPublicNews']);
    //Ganadores
    Route::get('/WinningNumber', [WinningticketController::class, 'WinningNumber']);
    Route::get('/winners', [WinningticketController::class, 'winners']);
});



// Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');