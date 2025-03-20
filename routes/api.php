<?php


use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\WinningticketController;
use App\Http\Controllers\API\UserController;

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::post('/createuser', [LoginController::class, 'check_in']);

Route::post('/login', [LoginController::class, 'login']);
Route::get('/authentication', [LoginController::class, 'handle_authentication'])->middleware('auth:sanctum');;
// Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth:sanctum');

//private
Route::apiResource('/users', UserController::class)->middleware('auth:sanctum');
Route::apiResource('/event',  EventController::class)->middleware('auth:sanctum');
Route::apiResource('/news',  NewsController::class)->middleware('auth:sanctum'); 
Route::apiResource('/Winningticket', WinningticketController::class)->middleware('auth:sanctum');

//public
Route::get('/public/event', [EventController::class, 'publicEvent']);
Route::get('/public/event/{id}', [EventController::class, 'showPublicEvent']);
Route::get('/public/news', [NewsController::class, 'publicNews']);
Route::get('/public/news/{id}', [NewsController::class, 'showPublicNews']);


// Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');