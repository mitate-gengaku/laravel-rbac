<?php

use App\Http\Controllers\Auth\GetAuthUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Http\Request;
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

// ログイン
Route::post("/login", LoginController::class);

Route::group(["middleware" => "auth:sanctum"], function() {
    Route::get('/user', GetAuthUserController::class);
    Route::post("/logout", LogoutController::class);
});
