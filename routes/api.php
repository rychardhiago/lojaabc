<?php

use App\Http\Controllers\LojaABC\ProductController;
use App\Http\Controllers\LojaABC\SaleController;
use App\Http\Controllers\LojaABC\SaleItemsController;
use App\Http\Controllers\UserController;
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
/**
 * Basic Auth to LojaABC
 */
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('products', [ProductController::class, 'index']);

    Route::get('sales', [SaleController::class, 'index']);

    Route::get('sales/{sales_id}', [SaleController::class, 'show']);

    Route::get('cancelSale', [SaleController::class, 'destroy']);
    Route::get('cancelSale/{sales_id}', [SaleController::class, 'destroy']);

    Route::post('sales', [SaleController::class, 'store']);

    Route::post('addProductToSale', [SaleItemsController::class, 'store']);
});

Route::post("login",[UserController::class,'index']);

