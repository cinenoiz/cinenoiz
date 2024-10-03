@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')

@endsection

@section('conteudo')

<h2 class="title">Cadastro de Sessão</h2>
<p class="text">Preencha a caixa de texto e clique em salvar para cadastrar uma nova sessão.</p>

<form action="/cadastro/sessao" method="POST">
    @csrf

    <div class="w-50">
        <label for="id_cinema">Cinema:</label>
        <select type="text" name="id_cinema" id="id_cinema" class="form-control p-2">
            <option value="0">Selecione uma opção...</option>
            @foreach($cinemas as $cinema)
                <option value="{{ $cinema['id'] }}">{{ $cinema['nome'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="w-50">
        <label for="id_filme">Filme:</label>

        <select type="text" name="id_filme" id="id_filme" class="form-control p-2">
            <option value="0">Selecione uma opção...</option>
            @foreach($filmes as $filme)
                <option value="{{ $filme['id'] }}">{{ $filme['titulo'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="w-50">
        <label for="dia_e_hora">Data e Hora Sessão:</label>
        <input type="datetime-local" name="dia_e_hora" id="dia_e_hora" class="form-control p-2">
    </div>

    <div class="w-50">
        <label for="sala">Sala:</label>
        <input type="text" name="sala" id="sala" class="form-control p-2" placeholder="45A">
    </div>

    <input type="submit" value="Salvar" class="btn btn-success mt-2 w-50">
</form>




@endsection


