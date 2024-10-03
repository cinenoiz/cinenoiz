<?php

namespace App\Http\Controllers;

use App\Models\Ingresso;
use Illuminate\Http\Request;

class IngressoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function validarIngresso($id)
    {
        $ingresso = Ingresso::find($id);

        if ($ingresso) {
            if ($ingresso->validado) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Ingresso já validado.'
                ]);
            }

            $ingresso->validado = true;
            $ingresso->save();

            return response()->json([
                'status' => 200,
                'message' => 'Ingresso validado com sucesso!'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Ingresso não encontrado.'
            ]);
        }
    }

    public function renderIngresso($id)
    {
        $ingresso = Ingresso::where('id', $id)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('ingresso', [ 'ingresso' => $ingresso[0] ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $ingresso = Ingresso::create([
            'id_sessao' => $request['sessao'],
            'nome_usuario' => $request['nome'],
            'cpf_usuario' => $request['cpf'],
        ]);

        $id = $ingresso->id;

        return redirect('/ingresso/' . $id)->with('success', 'Sessão adicionada com êxito!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingresso  $ingresso
     * @return \Illuminate\Http\Response
     */
    public function show(Ingresso $ingresso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingresso  $ingresso
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingresso $ingresso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingresso  $ingresso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingresso $ingresso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingresso  $ingresso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingresso $ingresso)
    {
        //
    }
}
