<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GeneroController extends Controller
{

    public function index() {
        $generos = Genero::all();
        return view('admin/visualizar/genero', ['generos' => $generos]);
    }


    public function store(Request $request) {
        $nome = $request['nome'];

        $genero = Genero::create([
            'nome' => $nome,
        ]);

        return redirect('/admin/cadastro')->with('success', 'Gênero `' . $nome . '` adicionado com êxito!');;
    }


}
