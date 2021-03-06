<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\SejourfrontController;
use App\Http\Controllers\VillefrontController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\dateController;
use App\Http\Controllers\ReservationController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[authController::class,'register']);
Route::post('/login',[authController::class,'login']);
Route::get('/sejours',[SejourfrontController::class,'index']);
Route::post('/search',[SejourfrontController::class,'search']);
Route::get('/villes',[VillefrontController::class,'index']);
Route::post('/user',[UserController::class,'fetch']);
Route::get('/date',[dateController::class,'index']);
Route::prefix('/user')->group(function(){
    Route::put('/update/{id}',[UserController::class,'update']);
});
Route::prefix('/reservation')->group(function(){
    Route::post('/store',[ReservationController::class,'store']);
    Route::get('/fetch/{id}',[ReservationController::class,'fetch'])->name('reser.fetch');
});
