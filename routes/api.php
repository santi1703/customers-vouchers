<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\VoucherController;

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

Route::post('authenticate', [AuthController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('customers/{id}', [CustomerController::class, 'fetch']);

    Route::get('vouchers/{id}', [VoucherController::class, 'checkValidity']);
});

Route::fallback(function () {
    return response()->json([
        'error' => 'Requested endpoint does not exist.',
    ]);
});
