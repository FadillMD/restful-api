<?php

use App\Http\Controllers\DasboardController;
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

Route::get('/', [DasboardController::class, 'countSopr'])->name('dashboard');

// SOPR Data Route
Route::get('soprs', [SoprController::class,'index'])->name('soprs.index');
Route::get('soprs/add', [SoprController::class,'create'])->name('soprs.add');
Route::post('soprs/add', [SoprController::class,'store'])->name('soprs.create');
Route::get('soprs/edit/{id}', [SoprController::class,'edit'])->name('soprs.edit');
Route::put('soprs/edit/{id}', [SoprController::class,'update'])->name('soprs.update');
Route::delete('soprs/{id}', [SoprController::class,'destroy'])->name('soprs.delete');

//PD Data Route
Route::get('product-determinations', [ProductDeterminationController::class,'index'])->name('pd.index');
Route::get('product-determinations/add', [ProductDeterminationController::class,'create'])->name('pd.add');
Route::post('product-determinations/add', [ProductDeterminationController::class,'store'])->name('pd.create');

// OPC Data Route
Route::get('opcs', [OpcController::class,'index'])->name('opcs.index');

//Sopr Order Data Route
Route::get('orders', [SoprProductDeterminationController::class,'index'])->name('order.index');
Route::get('order/{id}', [SoprProductDeterminationController::class,'show'])->name('order.show');
Route::get('orders/add', [SoprProductDeterminationController::class,'create'])->name('order.create');