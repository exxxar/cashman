<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('company/register', [\App\Http\Controllers\Companies\CompanyAuthController::class, 'register']);
Route::post('company/login', [\App\Http\Controllers\Companies\CompanyAuthController::class, 'login']);
Route::post('buy/subscription', [\App\Http\Controllers\Subscription\BuySubscriptionController::class, 'index']);
Route::post('send/message', [\App\Http\Controllers\Callback\CallbackController::class, 'index']);
