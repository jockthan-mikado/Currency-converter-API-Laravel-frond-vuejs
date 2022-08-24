<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PairController;
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

// Route::get("currencies", [CurrenciesController::class,"listCurrencies"]);
// Route::get("currency/{id}", [CurrenciesController::class,"getCurrency"]);
// Route::post("create-currency", [CurrenciesController::class,"create"]);
// Route::put("update/{id}", [CurrenciesController::class,"update"]);
// Route::delete("delete/{id}", [CurrenciesController::class,"delete"]);

Route::apiResource('currencies', CurrencyController::class);
Route::apiResource('pairs', PairController::class);
