<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieApiController;

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

Route::get('/', function () {
    return view('resources/views/Movie/index.blade.php');
});


Route::get('movie', [MovieApiController::class, 'index']);
Route::get('movie/{movie}', [MovieApiController::class, 'show']);
Route::post('movie', [MovieApiController::class, 'store']);
Route::put('movie/{movie}', [MovieApiController::class, 'update']);
Route::delete('movie/{movie}', [MovieApiController::class, 'destroy']);