<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\GameController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('games', GameController::class);

});
Route::middleware(['auth:sanctum', 'admin'])->group(function() {
    Route::post('/games', [GameController::class, 'store']);
    Route::put('/games/{game}', [GameController::class, 'update']);
    Route::delete('/games/{game}', [GameController::class, 'destroy']);
});