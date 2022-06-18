<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WeekendController;
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

Route::get('weekend',[WeekendController::class,'index']);
Route::post('weekend/store',[WeekendController::class,'store']);
Route::get('weekend/{id}',[WeekendController::class,'show']);
Route::post('weekend/update/{id}',[WeekendController::class,'update']);
Route::post('weekend/destroy/{id}',[WeekendController::class,'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
