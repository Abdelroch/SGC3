<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\V1\Usercontroller;
use App\Http\Controllers\API\V1\Cardcontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::prefix('v1')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::get('/card', [CardController::class, 'index']);
    Route::get('/card/{card}', [CardController::class, 'show']);
});

