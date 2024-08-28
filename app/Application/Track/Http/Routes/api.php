<?php

use Illuminate\Support\Facades\Route;
use App\Application\Track\Http\Controllers\TrackController;

Route::prefix('api')->group(function () {
    Route::prefix('tracks')->group(function () {
        Route::middleware(['auth:sanctum', 'ability:role:employee'])->group(function () {
            Route::post('attendances', [TrackController::class, 'attendance']);
        });
    });
});
