<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleQRcodeController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API! openweather9815@@
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('users/logout', [AuthController::class, 'logout']);
});
Route::get('getError', [AuthController::class, 'seterror']);
Route::get('users/emails', [AuthController::class, 'apiemail']);

Route::post('users/register ', [AuthController::class, 'register']);
Route::post('users/login', [AuthController::class, 'login']);

Route::get("simple-qrcode", [SimpleQRcodeController::class, 'generate']);

