<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/tanks', [\App\Http\Controllers\TanksController::class, 'index']);
    Route::get('/tanks/{id}', [\App\Http\Controllers\TanksController::class, 'show']);
    Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'index']);
    Route::get('/transactions/{id}', [\App\Http\Controllers\TransactionController::class, 'show']);
    Route::put('/transactions/{id}', [\App\Http\Controllers\TransactionController::class, 'update']);
});
