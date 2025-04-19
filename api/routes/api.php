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

    // posts
    // Route::get("/posts", PostListController::class);
    // Route::get("/posts/:postId", PostDetailController::class);
    // Route::post("/posts/", PostCreateController::class);
    // Route::patch("/posts/:postId", PostUpdateController::class);
    // Route::delete("/posts/:postId", PostDeleteController::class);

    // roles
    // Route::get("/roles", RoleListController::class);
    // Route::get("/roles/:rolesId", RoleDetailController::class);
    // Route::roles("/roles/", RoleCreateController::class);
    // Route::patch("/roles/:rolesId", RoleUpdateController::class);
    // Route::delete("/roles/:rolesId", RoleDeleteController::class);

    // permissions
    // Route::get("/permissions", PermissionListController::class);
    // Route::get("/permissions/:permissionsId", PermissionDetailController::class);
    // Route::permissions("/permissions/", PermissionCreateController::class);
    // Route::patch("/permissions/:permissionsId", PermissionUpdateController::class);
    // Route::delete("/permissions/:rolesId", PermissionDeleteController::class);
});
