<?php

use App\Application\User\Http\Controllers\UserController;
use App\Application\User\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::middleware(['auth:sanctum', 'ability:role:manager'])->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'employees']);
            Route::post('/', [UserController::class, 'store']);
            Route::delete('{id}', [UserController::class, 'destroyEmployee']);
        });
    });

    Route::post('/login', [AuthenticationController::class, 'authenticate']);
});
