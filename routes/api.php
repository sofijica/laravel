<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RadnikController;
use App\Http\Controllers\API\StrukaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
    GET /radnik - vrati sve radnike iz baze - index
    GET /radnik/{id} - vrati radnika sa datim id - jem iz baze
    POST /radnik - kreiraj novog radnika u bazi na osnovu podataka iz tela zahteva
    PUT /radnik/{id} - izmeni radnika sa id -jem na osnovu podataka iz tela zahteva
    DELETE /radnik/{id} - obrisi iz baze radnika sa datim id - jem

*/

Route::apiResource('radnik',RadnikController::class);
Route::apiResource('struka',StrukaController::class);