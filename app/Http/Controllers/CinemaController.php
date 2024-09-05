<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;

class CinemaController extends Controller
{

    public function index() {
        $cinemas = Cinema::all();
        return view('admin/visualizar/cinema', ['cinemas' => $cinemas]);
    }

    public function indexAPI() {
        $cinemas = Cinema::all();
        return $cinemas;
    }


    public function store(Request $request)
    {
        $cinema = Cinema::create([
            'nome' => $request['nome'],
            'logradouro' => $request['logradouro'],
            'numero' => $request['numero'],
            'cep' => $request['cep'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
        ]);

        return redirect('/admin/cadastro')->with('success', 'Cinema `' . $request['nome'] . '` adicionado com êxito!');;
    }


}
