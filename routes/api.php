<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('create', [TestController::class, 'create']);
Route::post('store', [TestController::class, 'store']);
Route::get('edit/{id}', [TestController::class, 'edit']);
Route::put('update/{id}', [TestController::class, 'update']);
Route::delete('delete/{id}', [TestController::class, 'delete']);


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::group(['middleware' => 'auth:api'], function(){
  Route::post('details', [UserController::class, 'details']);
});