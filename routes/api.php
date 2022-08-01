<?php

use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\TaskItemController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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


Route::post('register', [RegisterController::class, 'create']);
Route::post('login', [LoginController::class, 'login']);

Route::resource('todo', TaskController::class)->middleware('auth:api');
Route::resource('items', TaskItemController::class)->middleware('auth:api');
Route::get('users/{id}/todo', [TaskController::class,'getTodoListByUserid'])->middleware('auth:api');

