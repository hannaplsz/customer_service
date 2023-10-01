<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SourceController;
use App\Http\Controllers\API\UserController;
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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'sources', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [SourceController::class, 'index']);
    Route::post('add', [SourceController::class, 'add']);
    Route::get('edit/{id}', [SourceController::class, 'edit']);
    Route::post('update/{id}', [SourceController::class, 'update']);
    Route::delete('delete/{id}', [SourceController::class, 'delete']);
});