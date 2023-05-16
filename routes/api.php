<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [Controllers\AuthController::class, 'login']);
    Route::post('register', [Controllers\AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('logout', [Controllers\AuthController::class, 'logout']);
        Route::get('user', [Controllers\AuthController::class, 'user']);
    });

    Route::group(['middleware' => 'auth:api'], function() {
        Route::resource('role', [Controllers\RoleController::class]);
    });
});
