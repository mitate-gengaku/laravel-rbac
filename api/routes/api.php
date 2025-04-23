<?php

use App\Http\Controllers\Auth\GetAuthUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Models\User;
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
Route::post('/login', LoginController::class);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', GetAuthUserController::class);
    Route::post('/logout', LogoutController::class);

    // posts
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{id}', [PostController::class, 'show']);
    Route::patch('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);

    // users
    Route::group(['middleware' => ['can:user:list']], function () {
        Route::get('/users', function () {
            return response()->json([
                'users' => User::all()->makeVisible('password'),
            ]);
        });
    });

    // roles
    Route::group(['middleware' => ['can:role:list']], function () {
        Route::get('/roles', [RoleController::class, 'index']);
    });

    // Route::get("/roles/:rolesId", RoleDetailController::class);
    // Route::roles("/roles/", RoleCreateController::class);
    // Route::patch("/roles/:rolesId", RoleUpdateController::class);
    // Route::delete("/roles/:rolesId", RoleDeleteController::class);

    // permissions
    Route::group(['middleware' => ['can:permission:list']], function () {
        Route::get('/permissions', [PermissionController::class, 'index']);
    });
    // Route::get("/permissions/:permissionsId", PermissionDetailController::class);
    // Route::permissions("/permissions/", PermissionCreateController::class);
    // Route::patch("/permissions/:permissionsId", PermissionUpdateController::class);
    // Route::delete("/permissions/:rolesId", PermissionDeleteController::class);
});
