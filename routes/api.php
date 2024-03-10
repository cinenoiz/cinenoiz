<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/destaque', function (Request $request) {
    $filmesDestaque = [
        [
            'id' => 1,
            'titulo' => 'Homem Aranha - Longe de Casa',
            'banner' => 'https://imgur.com/iwulCFD.jpg',
            'producao' => 'Marvel Universe'
        ],
        [
            'id' => 2,
            'titulo' => 'Pantera Negra',
            'banner' => 'https://imgur.com/syIIuZ8.jpg',
            'producao' => 'Marvel Universe'
        ]
    ];

    return response()->json($filmesDestaque);
});
