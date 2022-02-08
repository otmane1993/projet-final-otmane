<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\adminController;
use App\Http\Middleware\usermiddleware;
use App\Http\Middleware\adminmiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/', function() {
//   return response()->json([
//     'stuff' => phpinfo()
//    ]);
// });
 //Route::get('/users',[UserController::class,'index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user',[UserController::class,'index'])->middleware(usermiddleware::class)->name('user');
Route::get('admin',[adminController::class,'index'])->middleware(adminmiddleware::class)->name('admin');
Route::prefix('admin')->group(function(){
    Route::get('/hotel',[HotelController::class,'index'])->name('hotel');
    Route::prefix('hotel')->group(function(){
        Route::get('create',[HotelController::class,'create'])->name('hotel.create');
        Route::post('store',[HotelController::class,'store'])->name('hotel.store');
        Route::get('show/{id}',[HotelController::class,'show'])->name('hotel.show');
        Route::get('edit/{id}',[HotelController::class,'edit'])->name('hotel.edit');
        Route::get('delete/{id}',[HotelController::class,'destroy'])->name('hotel.delete');
        Route::put('update/{id}',[HotelController::class,'update'])->name('hotel.update');
    });
    Route::get('/ville',[VilleController::class,'index'])->name('ville');
    Route::prefix('ville')->group(function(){
        Route::get('create',[VilleController::class,'create'])->name('ville.create');
        Route::get('delete/{id}',[VilleController::class,'destroy'])->name('ville.delete');
    });
    Route::get('/sejour',[SejourController::class,'index'])->name('sejour');
});

