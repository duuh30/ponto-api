<?php

use App\Application\User\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::prefix('users')->group(function () {
        Route::post('/', [UserController::class, 'store']);
    });
});
