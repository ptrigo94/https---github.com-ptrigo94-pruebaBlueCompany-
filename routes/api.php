<?php

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Controllers\ProductoController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('listarProductos',[ProductoController::class, 'productos']);
Route::get('listarProductos/{id}',[ProductoController::class, 'productoPorId']);
Route::get('listarProductosPorCategoria/{id}',[ProductoController::class, 'productoPorCategoria']);



