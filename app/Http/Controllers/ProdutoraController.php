<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtora;

class ProdutoraController extends Controller
{
    public function index() {
        $produtoras = Produtora::where('deleted', false)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin/visualizar/produtora', ['produtoras' => $produtoras]);
    }

    public function store(Request $request) {
        $nome = $request['nome'];

        $produtora = Produtora::create([
            'nome' => $nome,
        ]);

        return redirect('/admin/cadastro')->with('success', 'Produtora `' . $nome . '` adicionada com êxito!');
    }


    public function destroy($id)
    {
        $produtora = Produtora::find($id);

        if ($produtora) {
            $produtora->deleted = true;
            $produtora->save();
            return redirect('/admin/visualizar')->with('success', 'Produtora excluído com êxito!');
        }

        return redirect('/admin/visualizar')->with('error', 'Produtora não encontrado.');
    }

}
