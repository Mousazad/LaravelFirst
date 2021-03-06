<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserController;

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

Route::post('/login',[UserController::class, 'login']);
Route::middleware('auth:sanctum')->post('/userinfo',[UserController::class, 'getUserInfo']);


Route::post('/books/list',[BookController::class, 'getAllBooks']);
Route::middleware('auth:sanctum')->post('/books/add',[BookController::class, 'store']);
Route::post('/books/show',[BookController::class, 'show']);