<?php

use App\Http\Controllers\Fruit\ShowFruit;
use App\Http\Controllers\User\ShowUserController;
use App\Http\Controllers\User\UserStoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('user', [UserStoreController::class, 'storeUser'])->name('user.store');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    route::group(['middleware' => 'jwt.auth'], function() {
        Route::group(['namespaces' => 'Fruit', 'prefix' => 'fruit'], function () {
            Route::get('/', [ShowFruit::class, 'showAll'])->name('fruit.index');
        });
    });

    route::group(['middleware' => 'jwt.auth'], function() {
        Route::group(['namespaces' => 'User', 'prefix' => 'user'], function () {
            Route::get('/{person}', [ShowUserController::class, 'snowOnePerson'])->name('showOne.user');
        });
    });
});


