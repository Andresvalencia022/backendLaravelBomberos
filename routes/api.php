<?php


use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\WinningticketController;
use App\Http\Controllers\API\UserController;

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return response()->json(['message' => 'API is working']);
// });

Route::post('/createuser', [LoginController::class, 'check_in']);

Route::post('/login', [LoginController::class, 'login']);
Route::get('/authentication', [LoginController::class, 'handle_authentication'])->middleware('auth:sanctum');;
// Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth:sanctum');

Route::apiResource('/users', UserController::class)->middleware('auth:sanctum');
Route::apiResource('/event',  EventController::class)->middleware('auth:sanctum');
Route::apiResource('/news',  NewsController::class)->middleware('auth:sanctum'); 
 
Route::apiResource('/Winningticket', WinningticketController::class)->middleware('auth:sanctum');

// Route::get('/user', [LoginController::class, 'handle'])->middleware('auth:sanctum');
// Route::get('/category/all', [Category::class, 'categoryAll'])->middleware('auth:sanctum');
// Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');