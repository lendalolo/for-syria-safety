<?php

use App\Http\Controllers\Api\CompaignController;
use App\Http\Controllers\Api\ToolCompaignController;
use App\Http\Controllers\Api\ToolController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TeamReportController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\OrganizationCompaignController;
use App\Http\Controllers\Api\LearnController;
use App\Http\Controllers\Api\RewardController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\TeampositionController;
use App\Http\Controllers\Api\StepController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ObjectivesController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\UserController;
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
    Route::apiResource('/units',UnitController::class);
    Route::apiResource('/rewards',RewardController::class);
    Route::apiResource('/locations',LocationController::class);
    Route::apiResource('/teampositions',TeampositionController::class);
    Route::apiResource('/team_reports',TeamReportController::class);
    Route::apiResource('/steps',StepController::class);
    Route::apiResource('/organizations',OrganizationController::class);
    Route::apiResource('/donations',DonationController::class);
    Route::apiResource('/tools',ToolController::class);
    Route::apiResource('/objectives',ObjectivesController::class);
    Route::apiResource('/tool_compaign',ToolCompaignController::class);
    Route::apiResource('/organization_compaigns',OrganizationCompaignController::class);
    Route::apiResource('/users',UserController::class);


   // Route::get('/myTeams',[TeamController::class,'myTeam']);

});

//member

Route::middleware(["auth:sanctum"])->group(function(){

    //profile
    Route::get('/profile',[ProfileController::class,'show']);
    Route::patch('/profile',[ProfileController::class,'update']);
    Route::delete('/profile',[ProfileController::class,'destroy']);


    Route::apiResource('/reports',ReportController::class);
    Route::apiResource('/user',UserController::class);

    Route::Put('/RegerterInTeam',[UserController::class,'RegerterInTeam']);

});

Route::apiResource('/compaigns',CompaignController::class)->only(['index','show']);
Route::apiResource('/teams',TeamController::class)->only(['index','show']);
Route::apiResource('/reports',ReportController::class)->only(['index','show']);
Route::apiResource('/learns',LearnController::class)->only(['index','show']);
Route::apiResource('/rewards',RewardController::class)->only(['index','show']);
Route::apiResource('/organizations',OrganizationController::class)->only(['index','show']);
Route::apiResource('/tools',ToolController::class)->only(['index','show']);
Route::apiResource('/locations',LocationController::class)->only(['index','show']);
Route::apiResource('/teampositions',TeampositionController::class)->only(['index','show']);
Route::apiResource('/steps',StepController::class)->only(['index','show']);
// Route::group(['prefix'=>'admin'],(function(){

// }));
