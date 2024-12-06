<?php

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategorieController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    // Autres routes protégées
    Route::apiResource("users", UserController::class);

    Route::apiResource("posts", PostController::class)->middleware('auth:sanctum');

    Route::apiResource("categories", CategorieController::class)->middleware('auth:sanctum');

    Route::apiResource("roles", RoleController::class)->middleware('auth:sanctum');
});
