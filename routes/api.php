<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleItemsController;

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

