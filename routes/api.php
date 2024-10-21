<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\workspaceController;
use App\Http\Controllers\Api\boardController;
use App\Http\Controllers\Api\listController;
use App\Http\Controllers\Api\cardController;

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
Route::post('register',[AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::post('refresh', [AuthController::class,'refresh']);
Route::post('logout', [AuthController::class,'logout']);
// workspace
    route::post('create/workspace',[workspaceController::class,'create']);
    route::get('showAll/workspace',[workspaceController::class,'showAll']);
    route::post('Edite/workspace/{id}',[workspaceController::class,'Edite']);
    route::post('Delete/workspace/{id}',[workspaceController::class,'delete']);
// board
    route::post('create/board/{id}',[boardController::class,'create']);
    route::get('showAll/board/{id}',[boardController::class,'showAll']);
    route::post('Edite/board/{id}',[boardController::class,'Edite']);
    route::post('Delete/board/{id}',[boardController::class,'delete']);
    route::post('Add/user/{id}/{user_id}',[boardController::class,'AddUser']);

// lists
    route::post('create/list/{id}',[listController::class,'create']);
    route::get('showAll/list/{id}',[listController::class,'showAll']);
    route::post('Edite/list/{id}', [listController::class,'Edite']);
    route::post('Delete/list/{id}',[listController::class,'delete']);
// cards
    route::post('create/card/{id}',[cardController::class,'create']);
    route::get('showAll/card/{id}',[cardController::class,'showAll']);
    route::get('move/card/{id}/{list_id}',[cardController::class,'move']);
    route::post('Edite/card/{id}', [cardController::class,'Edite']);
    route::post('Delete/card/{id}',[cardController::class,'delete']);

