<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\ApplicationController;
use App\Http\Controllers\Api\V1\ApplicationTypeController;
use App\Http\Controllers\Api\V1\DriversController;
use App\Http\Controllers\Api\V1\LicenseClassesController;
use App\Http\Controllers\Api\V1\LicensesController;
use App\Http\Controllers\Api\V1\PeopleController;
use App\Http\Controllers\Api\V1\TestTypeController;
use App\Http\Controllers\Api\V1\UploadPersonImageController;
use App\Http\Controllers\Api\V1\UsersController;
use Illuminate\Support\Facades\Route;

//login
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group( function() {
    //logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Version 1
    Route::prefix('v1')->group( callback: function() {

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

        //Application Types
        Route::prefix('applicationTypes')->group( function() {
            Route::get('', [ApplicationTypeController::class, 'index']);
            Route::get('/{applicationType}', [ApplicationTypeController::class, 'show']);
            Route::post('/register', [ApplicationTypeController::class, 'store']);
            Route::patch('/{applicationType}', [ApplicationTypeController::class, 'update']);
            Route::delete('/{applicationType}', [ApplicationTypeController::class, 'destroy']);
        });

        // Applications
        Route::prefix('applications')->group( callback: function() {
            Route::get('', [ApplicationController::class, 'index']);
            Route::get('/{application}', [ApplicationController::class, 'show']);
            Route::post('/register', [ApplicationController::class, 'store']);
            Route::patch('/{application}', [ApplicationController::class, 'update']);
            Route::delete('/{application}', [ApplicationController::class, 'destroy']);
        });

        // Licenses
        Route::prefix('licenses')->group( callback: function() {
            Route::get('', [LicensesController::class, 'index']);
            Route::get('/{license}', [LicensesController::class, 'show']);
            Route::post('/register', [LicensesController::class, 'store']);
            Route::patch('/{license}', [LicensesController::class, 'update']);
            Route::patch('/toggleActivation/{license}', [LicensesController::class, 'toggleActivation']);
            Route::delete('/{license}', [LicensesController::class, 'destroy']);
        });

        // License Classes
        Route::prefix('licenseClasses')->group( callback: function() {
            Route::get('', [LicenseClassesController::class, 'index']);
            Route::get('/{licenseClass}', [LicenseClassesController::class, 'show']);
            Route::post('/register', [LicenseClassesController::class, 'store']);
            Route::patch('/{licenseClass}', [LicenseClassesController::class, 'update']);
            Route::delete('/{licenseClass}', [LicenseClassesController::class, 'destroy']);
        });

        // Test Types
        Route::prefix('testTypes')->group( callback: function() {
            Route::get('', [TestTypeController::class, 'index']);
            Route::get('/{testType}', [TestTypeController::class, 'show']);
            Route::post('/register', [TestTypeController::class, 'store']);
            Route::patch('/{testType}', [TestTypeController::class, 'update']);
            Route::delete('/{testType}', [TestTypeController::class, 'destroy']);
        });

    });
});
