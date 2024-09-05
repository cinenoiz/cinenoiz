<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnderecoController extends Controller
{
    public function getAddress(Request $request)
    {
        $latitude = $request->query('lat');
        $longitude = $request->query('lng');

        $response = Http::withHeaders([
            'Authorization' => 'Token token=5040d1c3dfa00b26f23271b71f8192d5',
        ])->get('https://www.cepaberto.com/api/v3/nearest', [
            'lat' => $latitude,
            'lng' => $longitude,
        ]);

        return $response->json();
    }
}
