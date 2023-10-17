<?php

use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\WarehouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
    Route::put('/{id}', [OrderController::class, 'update']);
    Route::post('/{id}/complete', [OrderController::class, 'complete']);
    Route::post('/{id}/cancel', [OrderController::class, 'cancel']);
    Route::post('/{id}/resume', [OrderController::class, 'resume']);
});
