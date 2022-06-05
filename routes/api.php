<?php

use App\Http\Controllers\GetController;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register',[UsersController::class,'registered']);
Route::post('login',[UsersController::class,'login']);

Route::middleware('refresh.token')->prefix('second')->group(function () {
    Route::post('takeform', [GetController::class, 'TakeForm']);  //表单填写
    Route::post('look', [GetController::class, 'look']);  //表单查看
});
