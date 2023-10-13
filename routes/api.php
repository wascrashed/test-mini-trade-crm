<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WarehouseController;
use App\Http\Controllers\API\OrdersController;
use App\Http\Controllers\API\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/warehouses', [WarehouseController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/orders', [OrdersController::class, 'index']);
Route::post('/orders', [OrdersController::class, 'store']);
Route::put('/orders/{id}', [OrdersController::class, 'update']);
Route::post('/orders/{id}/complete', [OrdersController::class, 'complete']);
Route::post('/orders/{id}/cancel', [OrdersController::class, 'cancel']);
Route::post('/orders/{id}/resume', [OrdersController::class, 'resume']);
