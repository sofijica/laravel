<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RadnikController;
use App\Http\Controllers\DepartmanController;

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


Route::get('/radnici',[RadnikController::class,'svi']);
Route::post('/radnik/ubaci',[RadnikController::class,'ubaci']);
Route::post('/radnik/{id}/izbaci',[RadnikController::class,'izbaci']);
Route::post('/radnik/{id}',[RadnikController::class,'obrisi']);
Route::post('/radnik',[RadnikController::class,'kreiraj']);
Route::get('/',[DepartmanController::class,'svi']);
Route::get('/departman/{id}',[DepartmanController::class,'prikazi']);
Route::post('/departman/{id}/obrisi',[DepartmanController::class,'obrisi']);
Route::post('/departman/{id}',[DepartmanController::class,'izmeni']);