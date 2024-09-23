<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GeneroController extends Controller
{

    public function index() {
        $generos = Genero::where('deleted', false)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin/visualizar/genero', ['generos' => $generos]);
    }


    public function store(Request $request) {
        $nome = $request['nome'];

        $genero = Genero::create([
            'nome' => $nome,
        ]);

        return redirect('/admin/cadastro')->with('success', 'Gênero `' . $nome . '` adicionado com êxito!');;
    }


    public function destroy($id)
    {
        $genero = Genero::find($id);

        if ($genero) {
            $genero->deleted = true;
            $genero->save();
            return redirect('/admin/visualizar')->with('success', 'Gênero excluído com êxito!');
        }

        return redirect('/admin/visualizar')->with('error', 'Gênero não encontrado.');
    }


}
