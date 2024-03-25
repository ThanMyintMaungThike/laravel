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
Route::group(["middleware"=>['auth:sanctum']],function() {
    Route::get('category',[CategoryController::class,'index']);
    Route::post('category/store',[CategoryController::class,'store']);
    Route::get('category/{id}/edit',[CategoryController::class,'edit']);
    Route::post('category/{id}/update',[CategoryController::class,'update']);
    Route::get('category/{id}/delete',[CategoryController::class,'delete']);
});


