<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BetslipController;

// Add the sanctum and web middleware group
Route::middleware(['auth:sanctum', 'web'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::apiResource('betslips', BetslipController::class);
});



