<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
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
Route::get('/item', [ItemController::class, 'index']);
Route::post('/item/create', [ItemController::class, 'store']);
Route::get('/item/{id}', [ItemController::class, 'show']);
Route::post('/item/update/{id}', [ItemController::class, 'update']);
Route::delete('/item/delete/{id}', [ItemController::class, 'destroy']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/create', [cartController::class, 'store']);
Route::get('/cart/{id}', [cartController::class, 'show']);
Route::post('/cart/update/{id}', [cartController::class, 'update']);
Route::delete('/cart/delete/{id}', [cartController::class, 'destroy']);