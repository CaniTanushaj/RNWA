<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\CastController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LiveSearchController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('movies', MovieController::class);
Route::resource('actors',ActorsController::class);
Route::resource('cast',CastController::class);

Route::get('/',function(){
    return redirect('/movies');
});

Route::get('/movies.orderbyDate',[MovieController::class, 'orderbyDate']);
Route::get('/actors.orderbyBirthDate',[ActorsController::class, 'orderbyBirthDate']);
Route::post('/movies.search', [MovieController::class, 'search'])->name('movie.search');
Route::post('/actor.search', [ActorsController::class, 'search'])->name('actors.search');
Route::get('/movies.fetch', [MovieController::class, 'fetch'])->name('movie.fetch');
Route::get('/actors.fetch', [ActorsController::class, 'fetch'])->name('actors.fetch');




Route::get('/live',[LiveSearchController::class, 'action']);