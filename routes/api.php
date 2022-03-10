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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//JsonPlaceholder API
Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/getAll', [\App\Http\Controllers\Api\UserController::class, 'getAll'])->name('getAll');
    Route::get('/getById/{id}', [\App\Http\Controllers\Api\UserController::class, 'getById'])->name('getById');
});
//Gender API
Route::group(['prefix' => 'gender', 'as' => 'gender.'], function () {
    Route::get('/getAll', [\App\Http\Controllers\Api\GenderUserController::class, 'getAll'])->name('getAll');
    Route::get('/getById/{name}', [\App\Http\Controllers\Api\GenderUserController::class, 'getById'])->name('getById');
});
