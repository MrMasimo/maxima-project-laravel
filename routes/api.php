<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\User\PostController;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::prefix('user')->middleware('roles:user,admin')->group(function () {
        Route::get('/', fn (Request $request) => $request->user())->name('get')->middleware('roles:admin');
        Route::prefix('posts')->group(function () {
            Route::get('index', [PostController::class, 'index']);
            Route::post('store', [PostController::class, 'store']);
            Route::middleware('owner:post')->group(function () {
                Route::get('{post}/show', [PostController::class, 'show']);
                Route::post('{post}/update', [PostController::class, 'update']);
                Route::delete('{post}/delete', [PostController::class, 'delete']);
            });
        });
    });
});
