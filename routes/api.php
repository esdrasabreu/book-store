<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserController;

use Illuminate\Support\Facades\Route;


Route::post('/user', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/book', [BookController::class, 'store']);

    Route::delete('/book/{id}', [BookController::class, 'destroy']);

    Route::get('/book', [BookController::class, 'index']);

    Route::get('/book/{id}', [BookController::class, 'show']);

    Route::get('/books/search/name/{name}', [BookController::class, 'searchByName']);
    Route::get('/books/search/value/{value}', [BookController::class, 'searchByValue']);
    Route::get('/books/search/isbn/{isbn}', [BookController::class, 'searchByISBN']);
    
    Route::put('/book/{id}', [BookController::class, 'update']);
});

Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

