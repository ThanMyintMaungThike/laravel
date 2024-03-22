<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[LoginController::class,'login']);
Route::get('category',[CategoryController::class,'index']);
Route::post('category/store',[CategoryController::class,'store']);
Route::get('category/edit',[CategoryController::class,'edit']);
Route::get('category/update',[CategoryController::class,'update']);

