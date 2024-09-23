<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;

class CinemaController extends Controller
{

    public function index() {
        $cinemas = Cinema::where('deleted', false)
                         ->orderBy('created_at', 'desc')
                         ->get();
        return view('admin/visualizar/cinema', ['cinemas' => $cinemas]);
    }

    public function indexAPI() {
        $cinemas = Cinema::where('deleted', false)
                         ->orderBy('created_at', 'desc')
                         ->get();
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

        return redirect('/admin/cadastro')->with('success', 'Cinema `' . $request['nome'] . '` adicionado com êxito!');
    }


    public function destroy($id)
    {
        $cinema = Cinema::find($id);

        if ($cinema) {
            $cinema->deleted = true;
            $cinema->save();
            return redirect('/admin/visualizar')->with('success', 'Cinema excluído com êxito!');
        }

        return redirect('/admin/visualizar')->with('error', 'Cinema não encontrado.');
    }

}
