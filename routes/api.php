<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\WorksController;
use Illuminate\Support\Facades\Route;

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


Route::get('/blog',[HomeController::class,'blog']);
Route::get('/blogs',[BlogController::class,'blogs']);
Route::get('/services',[ServicesController::class,'services']);
Route::get('/works',[WorksController::class,'work']);
