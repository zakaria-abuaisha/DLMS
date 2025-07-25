<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\PeopleController;
use App\Http\Controllers\Api\V1\UploadPersonImageController;
use App\Http\Controllers\Api\V1\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group( function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Users
    Route::prefix('v1')->group( function() {
        // Users.
       Route::prefix('users')->group( function() {
           Route::post('/register', [UsersController::class, 'store']);
           Route::get('/{user}', [UsersController::class, 'show']);
           Route::get('', [UsersController::class, 'index']);
           Route::delete('/{user}', [UsersController::class, 'destroy']);
           Route::patch('/{user}', [UsersController::class, 'update']);
       });

       // People
        Route::prefix('people')->group( function() {
            Route::post('/register', [PeopleController::class, 'store']);
            Route::post('/uploadPersonImage/{person}', UploadPersonImageController::class);
            Route::get('/person', [PeopleController::class, 'show']);
            Route::get('', [PeopleController::class, 'index']);
            Route::patch('/{person}', [PeopleController::class, 'update']);
            Route::delete('/{person}', [PeopleController::class, 'destroy']);
        });
    });
});
