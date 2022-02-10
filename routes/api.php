<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiAuthMiddleware;

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
// User Controller Routes
Route::post('/register', 'UserController@store');
Route::get('/clientes', 'UserController@index');

/* Ruta de prueba para validar tokens de inicio de sesion */
Route::post('/tokenValidation', function (Request $request) {
    return response()->json(array(
        'status' => 'Success',
        'code' => 200,
        'message' => 'Token validated',
    ), 200);
})->middleware('api.auth');
