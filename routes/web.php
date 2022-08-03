<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('test');
// });

Route::get('create', [TestController::class, 'create']);
Route::post('store', [TestController::class, 'store']);
Route::get('edit/{id}', [TestController::class, 'edit']);
Route::put('update/{id}', [TestController::class, 'update']);
Route::delete('delete/{id}', [TestController::class, 'delete']);



