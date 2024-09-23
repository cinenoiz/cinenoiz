<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Genero;
use App\Models\Produtora;
use App\Models\FilmeGenero;

class FilmeController extends Controller
{

    public function index() {
        $filmes = Filme::where('deleted', false)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin/visualizar/filme', ['filmes' => $filmes]);
    }

    public function store(Request $request)
    {
        //
    }

    public function storeAPI(Request $request)
    {

        $titulo = $request['titulo'];
        $generos = json_decode($request['generos']);
        $produtora = $request['produtora'];
        $sinopse = $request['sinopse'];


        if ($request->hasFile('imgBanner') && $request->hasFile('imgPersonagem') && $request->hasFile('imgCartaz') && $request->hasFile('imgFilme1') && $request->hasFile('imgFilme2')) {
            $banner = $request->file('imgBanner');
            $personagem = $request->file('imgPersonagem');
            $cartaz = $request->file('imgCartaz');
            $filme1 = $request->file('imgFilme1');
            $filme2 = $request->file('imgFilme2');

            $titulo = $request->input('titulo');
            $sinopse = $request->input('sinopse');

            $filme = Filme::create([
                'titulo' => $titulo,
                'sinopse' => $sinopse,
            ]);

            $baseDir = 'filmes/' . $filme->id;

            if ($request->hasFile('imgBanner')) {
                $filme->banner_path = $request->file('imgBanner')->store($baseDir, 'public');
            }

            if ($request->hasFile('imgPersonagem')) {
                $filme->personagem_path = $request->file('imgPersonagem')->store($baseDir, 'public');
            }

            if ($request->hasFile('imgCartaz')) {
                $filme->cartaz_path = $request->file('imgCartaz')->store($baseDir, 'public');
            }

            if ($request->hasFile('imgFilme1')) {
                $filme->filme1_path = $request->file('imgFilme1')->store($baseDir, 'public');
            }

            if ($request->hasFile('imgFilme2')) {
                $filme->filme2_path = $request->file('imgFilme2')->store($baseDir, 'public');
            }

            $filme->id_produtora = $produtora;

            $filme->save();

            foreach($generos as $genero) {
                $filme_genero = FilmeGenero::create([
                    'id_filme' => $filme->id,
                    'id_genero' => $genero
                ]);
            }

            return response()->json([
                'sucesso' => 'Filme registrado com êxito!',
            ]);

        } else {
            return response()->json([
                'erro' => 'Alguns arquivos não foram enviados.'
            ]);
        }

        return response()->json([
            'erro' => 'Erro não especificado.'
        ]);


    }

    /*
    |--------------------------------------------------------------------------
    | Render Router
    |--------------------------------------------------------------------------
    */
    public function renderHome() {
        $filmes_destaque = DB::select('
            SELECT
                filme.id,
                filme.titulo,
                filme.sinopse,
                produtora.nome AS produtora_nome,
                filme.banner_path,
                filme.personagem_path,
                filme.cartaz_path,
                filme.filme1_path,
                filme.filme2_path,
                GROUP_CONCAT(genero.nome SEPARATOR "/") AS generos
            FROM filme
            JOIN filme_genero ON filme_genero.id_filme = filme.id
            JOIN genero ON filme_genero.id_genero = genero.id
            JOIN produtora ON filme.id_produtora = produtora.id
            WHERE filme.deleted = false
            GROUP BY
                filme.id,
                filme.titulo,
                filme.sinopse,
                produtora.nome,
                filme.banner_path,
                filme.personagem_path,
                filme.cartaz_path,
                filme.filme1_path,
                filme.filme2_path
            ORDER BY RAND()
            LIMIT 3
        ');

        $ids_destaque = array_column($filmes_destaque, 'id');
        $ids_destaque_placeholder = implode(',', array_map('intval', $ids_destaque));

        $outros_filmes = DB::select("
            SELECT
                filme.id,
                filme.titulo,
                filme.sinopse,
                produtora.nome AS produtora_nome,
                filme.banner_path,
                filme.personagem_path,
                filme.cartaz_path,
                filme.filme1_path,
                filme.filme2_path,
                GROUP_CONCAT(genero.nome SEPARATOR '/') AS generos
            FROM filme
            JOIN filme_genero ON filme_genero.id_filme = filme.id
            JOIN genero ON filme_genero.id_genero = genero.id
            JOIN produtora ON filme.id_produtora = produtora.id
            WHERE filme.deleted = false AND filme.id NOT IN ($ids_destaque_placeholder)
            GROUP BY
                filme.id,
                filme.titulo,
                filme.sinopse,
                produtora.nome,
                filme.banner_path,
                filme.personagem_path,
                filme.cartaz_path,
                filme.filme1_path,
                filme.filme2_path
            ORDER BY RAND()
        ");

        $para_familia = DB::select("
            SELECT
                filme.id,
                filme.titulo,
                filme.sinopse,
                produtora.nome AS produtora_nome,
                filme.banner_path,
                filme.personagem_path,
                filme.cartaz_path,
                filme.filme1_path,
                filme.filme2_path,
                GROUP_CONCAT(genero.nome SEPARATOR '/') AS generos
            FROM filme
            JOIN filme_genero ON filme_genero.id_filme = filme.id
            JOIN genero ON filme_genero.id_genero = genero.id
            JOIN produtora ON filme.id_produtora = produtora.id
            WHERE filme.deleted = false AND id_genero IN (2, 3, 6, 7)
            GROUP BY
                filme.id,
                filme.titulo,
                filme.sinopse,
                produtora.nome,
                filme.banner_path,
                filme.personagem_path,
                filme.cartaz_path,
                filme.filme1_path,
                filme.filme2_path
            ORDER BY RAND()
        ");

        $cinemas = DB::select("SELECT nome, latitude 'lat', longitude 'lng', logradouro, numero, cep, bairro, cidade, uf FROM `cinema` WHERE deleted = 0");

        return view('home', [
            'filmes_destaque' => $filmes_destaque,
            'outros_filmes' => $outros_filmes,
            'para_familia' => $para_familia,
            'cinemas' => $cinemas
        ]);
    }



    public function renderCadastro() {
        $generos = Genero::where('deleted', false)
        ->orderBy('created_at', 'desc')
        ->get();;
        $produtoras = Produtora::where('deleted', false)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin/cadastro/filme', ['generos' => $generos, 'produtoras' => $produtoras]);
    }


    public function destroy($id)
    {
        $filme = Filme::find($id);

        if ($filme) {
            $filme->deleted = true;
            $filme->save();
            return redirect('/admin/visualizar')->with('success', 'Filme excluído com êxito!');
        }

        return redirect('/admin/visualizar')->with('error', 'Filme não encontrado.');
    }

}
