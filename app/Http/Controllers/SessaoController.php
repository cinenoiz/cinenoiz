<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Sessao;
use App\Models\Filme;
use App\Models\Cinema;
use App\Models\Ingresso;
use Illuminate\Http\Request;

class SessaoController extends Controller
{

    public function renderCadastro() {
        $filmes = Filme::where('deleted', false)
        ->orderBy('created_at', 'desc')
        ->get();


        $cinemas = Cinema::where('deleted', false)
        ->orderBy('created_at', 'desc')
        ->get();


        return view('admin/cadastro/sessao', [
            'filmes' => $filmes,
            'cinemas' => $cinemas
        ]);
    }

    public function renderSessoesFilme($id) {

        $sessoes = DB::select("
            SELECT sessao.*, cinema.nome AS cinema_nome, filme.titulo AS filme_titulo, filme.cartaz_path
            FROM sessao
            JOIN cinema ON sessao.id_cinema = cinema.id
            JOIN filme ON sessao.id_filme = filme.id
            WHERE sessao.deleted = false
            AND filme.id = ?
            ORDER BY sessao.created_at DESC
        ", [$id]);

        return view('sessoes', [
            'sessoes' => $sessoes
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$sessoes = Sessao::where('deleted', false)
        ->orderBy('created_at', 'desc')
        ->get();*/

        $sessoes = Sessao::where('deleted', false)
            ->with(['cinema', 'filme', 'ingressos'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin/visualizar/sessao', ['sessoes' => $sessoes]);
    }

    public function getIngressosSection($id) {
        $ingressos = Ingresso::where('id_sessao', $id)->where('deleted', false)->orderBy('created_at', 'desc')->get();;
        return response()->json(['ingressos' => $ingressos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sessao = Sessao::create([
            'dia_e_hora' => $request['dia_e_hora'],
            'sala' => $request['sala'],
            'id_filme' => $request['id_filme'],
            'id_cinema' => $request['id_cinema']
        ]);

        return redirect('/admin/cadastro')->with('success', 'Sessão adicionada com êxito!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function show(Sessao $sessao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function edit(Sessao $sessao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sessao $sessao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sessao $sessao)
    {
        //
    }
}
