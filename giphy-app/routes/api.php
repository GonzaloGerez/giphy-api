<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GifController;
use App\Http\Controllers\FavoriteGifController;


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
Route::prefix('giphy')->group(function (){
    Route::post('/register', [UserController::class ,'register']);
    Route::post('/login', [UserController::class ,'login']);
    Route::middleware('auth:api')->group(function (){
        Route::post('/search', [GifController::class, 'search']);
        Route::post('/searchById', [GifController::class, 'searchById']);
        Route::post('/addFavorite', [FavoriteGifController::class, 'store']);
    });
});