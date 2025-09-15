<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // CRUD user hanya untuk admin
    Route::middleware('can:isAdmin')->group(function () {
        Route::apiResource('users', UserController::class);
    });

    // Search untuk semua user yang sudah login
    Route::get('/search/name/{name}', [SearchController::class, 'byName']);
    Route::get('/search/nim/{nim}', [SearchController::class, 'byNim']);
    Route::get('/search/ymd/{ymd}', [SearchController::class, 'byYmd']);
});
