<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\UserComonController;
use App\Http\Controllers\API\hospital\UserController;
use App\Http\Controllers\API\nurses\NurseJobController;
use App\Http\Controllers\API\nurses\NurseUserController;
use App\Http\Controllers\API\nurses\NursePaymentController;
use App\Http\Controllers\API\hospital\HospitalJobController;

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
// user controller routes

// sanctum auth middleware routes   
Route::middleware('auth:api')->group(function () {
    Route::get("user", [UserController::class, "user"]);
   
});
