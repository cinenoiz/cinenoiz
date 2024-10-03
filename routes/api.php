<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FilmeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\IngressoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/* START FILME CONTROLLER */

// create
Route::post('/cadastro/filme', [FilmeController::class, 'storeAPI']);

/* END FILME CONTROLLER */


/*
|--------------------------------------------------------------------------
| GET Routes
|--------------------------------------------------------------------------
*/
Route::get('/cinema', [CinemaController::class, 'indexAPI']);



/*
|--------------------------------------------------------------------------
| Endereco Request
|--------------------------------------------------------------------------
*/
Route::get('/endereco', [EnderecoController::class, 'getAddress']);



Route::patch('/validar/ingresso/{id}', [IngressoController::class, 'validarIngresso']);

