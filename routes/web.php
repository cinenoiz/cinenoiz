<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\ProdutoraController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\IngressoController;

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
/*
Route::get('/', function () {
    return view('home');
});*/

Route::get('/', [FilmeController::class, 'renderHome']);
Route::get('/sessoes/{id}', [SessaoController::class, 'renderSessoesFilme']);
Route::get('/ingresso/{id}', [IngressoController::class, 'renderIngresso']);


/*
|--------------------------------------------------------------------------
| Admin Routes GET
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {
    return view('admin/index');
});

Route::get('/admin/cadastro/', function () {
    return view('admin/cadastro');
});

Route::get('/admin/cadastro/cinema', function () {
    return view('admin/cadastro/cinema');
});

Route::get('/admin/cadastro/filme', [FilmeController::class, 'renderCadastro']);

Route::get('/admin/cadastro/genero', function () {
    return view('admin/cadastro/genero');
});

Route::get('/admin/cadastro/produtora', function () {
    return view('admin/cadastro/produtora');
});

Route::get('/admin/cadastro/sessao', [SessaoController::class, 'renderCadastro']);

Route::get('/admin/configuracao/', function () {
    return view('admin/configuracao');
});

Route::get('/admin/localizacao/', function () {
    return view('admin/localizacao');
});

Route::get('/admin/visualizar/', function () {
    return view('admin/visualizar');
});

/*
|--------------------------------------------------------------------------
| Admin Routes GET -> View
|--------------------------------------------------------------------------
*/

Route::get('/admin/visualizar/genero', [GeneroController::class, 'index']);
Route::get('/admin/visualizar/filme', [FilmeController::class, 'index']);
Route::get('/admin/visualizar/produtora', [ProdutoraController::class, 'index']);
Route::get('/admin/visualizar/cinema', [CinemaController::class, 'index']);
Route::get('/admin/visualizar/sessao', [SessaoController::class, 'index']);


Route::get('/sessao/{id}/ingressos', [SessaoController::class, 'getIngressosSection']);


/*
|--------------------------------------------------------------------------
| Admin Routes POST
|--------------------------------------------------------------------------
*/

Route::post('/cadastro/produtora', [ProdutoraController::class, 'store']);
Route::post('/cadastro/genero', [GeneroController::class, 'store']);
Route::post('/cadastro/cinema', [CinemaController::class, 'store']);
Route::post('/cadastro/sessao', [SessaoController::class, 'store']);
Route::post('/cadastro/ingresso', [IngressoController::class, 'store']);

/*
|--------------------------------------------------------------------------
| DELETE Routes
|--------------------------------------------------------------------------
*/
Route::delete('/delete/cinema/{id}', [CinemaController::class, 'destroy']);
Route::delete('/delete/filme/{id}', [FilmeController::class, 'destroy']);
Route::delete('/delete/genero/{id}', [GeneroController::class, 'destroy']);
Route::delete('/delete/produtora/{id}', [ProdutoraController::class, 'destroy']);
