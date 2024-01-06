<?php

use App\Http\Controllers\web\OpcController;
use App\Http\Controllers\web\ProductDeterminationController;
use App\Http\Controllers\web\SoprController;
use App\Http\Controllers\web\SoprProductDeterminationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// SOPR Data Route
Route::get('soprs', [SoprController::class,'index']);
Route::get('soprs/add', [SoprController::class,'create']);
Route::post('soprs/add', [SoprController::class,'store']);

//PD Data Route
Route::get('product-determinations', [ProductDeterminationController::class,'index']);

// OPC Data Route
Route::get('opcs', [OpcController::class,'index']);

//Sopr Order Data Route
Route::get('sopr-product-determinations', [SoprProductDeterminationController::class,'index']);
Route::get('sopr-product-determinations/{id}', [SoprProductDeterminationController::class,'show']);