<?php

use App\Http\Controllers\API\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/login', [AuthController::class,'login']);


Route::apiResource("users", UserController::class)->middleware('auth:sanctum');

Route::apiResource("posts", PostController::class)->middleware('auth:sanctum');

Route::apiResource("categories", CategorieController::class)->middleware('auth:sanctum');


