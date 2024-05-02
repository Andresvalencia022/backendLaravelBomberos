<?php

use App\Http\Controllers\API\Event;
use App\Http\Controllers\API\News;
use App\Http\Controllers\API\Winningticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return response()->json(['message' => 'API is working']);
// });

Route::post('/createuser', [Login::class, 'check_in']);

Route::post('/login', [Login::class, 'login']);
// Route::get('/user', [LoginController::class, 'handle'])->middleware('auth:sanctum');
// Route::get('/category/all', [Category::class, 'categoryAll'])->middleware('auth:sanctum');
// Route::apiResource('/event',  Event::class)->middleware('auth:sanctum'); 
// Route::apiResource('/news',  News::class)->middleware('auth:sanctum'); 
// Route::apiResource('/Winningticket', Winningticket::class)->middleware('auth:sanctum');
// Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');