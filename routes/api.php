<?php

use App\Http\Controllers\Api\CompaignController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TeamReportController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\LearnController;
use App\Http\Controllers\Api\RewardController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\TeampositionController;
use App\Http\Controllers\Api\StepController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])
        ->middleware('auth:sanctum');
    Route::post('refresh', [AuthController::class, 'refresh'])
        ->middleware('auth:sanctum');
});
Route::middleware('auth:sanctum')->group(function(){
   Route::get('/user',function(){
            return ;
return response()->json(['message'=>'hello user']);

    });
});

//admin
Route::middleware(["auth:sanctum",'is_admin'])->prefix('admin')->group(function(){


Route::apiResource('/compaigns',CompaignController::class);
Route::apiResource('/teams',TeamController::class);
Route::apiResource('/reports',ReportController::class);
Route::apiResource('/learns',LearnController::class);
Route::apiResource('/rewards',RewardController::class);
Route::apiResource('/locations',LocationController::class);
Route::apiResource('/teampositions',TeampositionController::class);
Route::apiResource('/team_reports',TeamReportController::class);
Route::apiResource('/steps',StepController::class);

});

//member

Route::middleware(["auth:sanctum",'is_member'])->group(function(){


});
Route::group(['prefix'=>'admin'],(function(){

}));