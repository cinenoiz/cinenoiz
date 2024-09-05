<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtora;

class ProdutoraController extends Controller
{
    public function index() {
        $produtoras = Produtora::all();
        return view('admin/visualizar/produtora', ['produtoras' => $produtoras]);
    }

    public function store(Request $request) {
        $nome = $request['nome'];

        $produtora = Produtora::create([
            'nome' => $nome,
        ]);

        return redirect('/admin/cadastro')->with('success', 'Produtora `' . $nome . '` adicionada com êxito!');
    }

}
