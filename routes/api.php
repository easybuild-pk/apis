<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\MaterialController;
use App\Http\Controllers\Api\V1\ProjectController;
use Illuminate\Http\Request;

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

Route::namespace('Api\V1')->prefix('v1')->group( function () {
    Route::namespace('Auth')->prefix('auth')->group(function () {
        Route::put('signup', [AuthController::class, 'signup']);
        Route::put('login', [AuthController::class, 'login']);
    });

    Route::middleware('auth:api')->group( function() {
        Route::namespace('Auth')->prefix('auth')->group( function () {
            Route::put('logout', [AuthController::class, 'logout']);
        });

        Route::prefix('project')->group( function () {
            Route::put('/', [ProjectController::class, 'createProject']);
            Route::get('/list', [ProjectController::class, 'getProjects']);
        });

        Route::prefix('material')->group( function () {
            Route::put('/', [MaterialController::class, 'getProjectMaterials']);
        });

    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
