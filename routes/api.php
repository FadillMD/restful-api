<?php

use App\Http\Controllers\Api\OpcController;
use App\Http\Controllers\Api\ProductDeterminationController;
use App\Http\Controllers\Api\SoprController;
use App\Http\Controllers\Api\SoprProductDeterminationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/soprs', SoprController::class);
Route::apiResource('/product-determinations', ProductDeterminationController::class);
Route::apiResource('/sopr-product-determinations', SoprProductDeterminationController::class);
Route::apiResource('/opcs', OpcController::class);