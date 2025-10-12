<?php

use Illuminate\Http\Request;
use App\Support\Helpers\RouteBinding;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\{PromotionController, CategoryController, LocationController, UserController};

RouteBinding::register();

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class);
Route::apiResource('promotions', PromotionController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('locations', LocationController::class);
