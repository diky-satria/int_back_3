<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('article', [PostController::class, 'index']);
Route::get('article/{id}', [PostController::class, 'show']);
Route::post('article', [PostController::class, 'store']);
Route::patch('article/{id}', [PostController::class, 'update']);
Route::delete('article/{id}', [PostController::class, 'destroy']);