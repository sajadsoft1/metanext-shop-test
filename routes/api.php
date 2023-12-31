<?php

use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\BrandController;
use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Http\Request;
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

auth()->login(\App\Models\User::first());

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('blog', BlogController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('brand', BrandController::class);


Route::get('blog/toggle/{blog}', [BlogController::class, 'toggle']);
Route::apiResource('user',\App\Http\Controllers\Api\V1\UserController::class);
