<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])
        ->middleware('auth:api');
    Route::post('refresh', [AuthController::class, 'refresh'])
        ->middleware('auth:api');
});
Route::middleware('auth:sanctum')->group(function(){
   Route::get('/user',function(){
            return 'hello user';
    });
});
Route::middleware('auth:sanctum','is_admin')->group(function(){
Route::get('/admin',function(){
return 'hello admin';
});
});