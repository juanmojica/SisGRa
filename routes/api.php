<?php

use App\Http\Controllers\PolicialController;
use App\Models\Policial;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

//rotas para policiais
Route::apiResource('policial', 'PolicialController');

//rotas para radios
Route::apiResource('radio', 'RadioController');

//rotas para cautelas
Route::apiResource('cautela', 'CautelaController');
