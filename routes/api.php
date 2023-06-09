<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TransactionController;



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

// Route:: get('categories',[\App\Http\Controllers\Api\CategoryController::class,'index']);
// Route:: get('categories/{category}',[\App\Http\Controllers\Api\CategoryController::class,'show']);
// Route:: post('categories',[\App\Http\Controllers\Api\CategoryController::class,'store']);
Route::group(['middleware' => 'auth:sanctum'], function(){

    Route:: resource('transactions',\App\Http\Controllers\Api\TransactionController::class);
});
Route:: resource('categories',\App\Http\Controllers\Api\CategoryController::class);

Route::post('/auth/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/auth/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/auth/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

