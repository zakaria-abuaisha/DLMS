<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\DriversController;
use App\Http\Controllers\Api\V1\PeopleController;
use App\Http\Controllers\Api\V1\UploadPersonImageController;
use App\Http\Controllers\Api\V1\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//login
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group( function() {
    //logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Version 1
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
            Route::get('/{person}', [PeopleController::class, 'show']);
            Route::get('', [PeopleController::class, 'index']);
            Route::patch('/{person}', [PeopleController::class, 'update']);
            Route::delete('/{person}', [PeopleController::class, 'destroy']);
        });

        // Drivers
        Route::prefix('drivers')->group( callback: function() {
            Route::post('/register', [DriversController::class, 'store']);
            Route::get('', [DriversController::class, 'index']);
            Route::get('/{driver}', [DriversController::class, 'show']);
            Route::delete('/{driver}', [DriversController::class, 'destroy']);
        });
    });
});
