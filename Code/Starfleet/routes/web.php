<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();


Route::get('/', function () {
    return view('index');
});

Route::prefix('/planets')->group(function(){
    Route::get('/', [App\Http\Controllers\PlanetsController::class, 'index']);
    Route::get('/create', [App\Http\Controllers\PlanetsController::class, 'create']);
    Route::post('/store', [App\Http\Controllers\PlanetsController::class, 'store']);
    Route::get('/{planet}/details', [App\Http\Controllers\PlanetsController::class, 'details']);
    Route::get('/{planet}/edit', [App\Http\Controllers\PlanetsController::class, 'edit']);
    Route::put('/{planet}/update', [App\Http\Controllers\PlanetsController::class, 'update']);
    Route::get("/{planet}/delete", [App\Http\Controllers\PlanetsController::class, 'delete']);
});

Route::prefix('/starships/types')->group(function(){
    Route::get('/', [App\Http\Controllers\StarshipTypesController::class, 'index']);
    Route::get('/create', [App\Http\Controllers\StarshipTypesController::class, 'create']);
    Route::post('/store', [App\Http\Controllers\StarshipTypesController::class, 'store']);
    Route::get('/{starshiptype}/details', [App\Http\Controllers\StarshipTypesController::class, 'details']);
    Route::get('/{starshiptype}/edit', [App\Http\Controllers\StarshipTypesController::class, 'edit']);
    Route::put('/{starshiptype}/update', [App\Http\Controllers\StarshipTypesController::class, 'update']);
    Route::get("/{starshiptype}/delete", [App\Http\Controllers\StarshipTypesController::class, 'delete']);
});

Route::prefix('/species')->group(function(){
    Route::get('/', [App\Http\Controllers\SpeciesController::class, 'index']);
    Route::get('/create', [App\Http\Controllers\SpeciesController::class, 'create']);
    Route::post('/store', [App\Http\Controllers\SpeciesController::class, 'store']);
    Route::get('/{species}/details', [App\Http\Controllers\SpeciesController::class, 'details']);
    Route::get('/{species}/edit', [App\Http\Controllers\SpeciesController::class, 'edit']);
    Route::put('/{species}/update', [App\Http\Controllers\SpeciesController::class, 'update']);
    Route::get("/{species}/delete", [App\Http\Controllers\SpeciesController::class, 'delete']);
});
