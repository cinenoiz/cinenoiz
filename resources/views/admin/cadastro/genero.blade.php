@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')

@endsection

@section('conteudo')

<h2 class="title">Cadastro de Gênero</h2>
<p class="text">Preencha a caixa de texto e clique em salvar para cadastrar um novo gênero.</p>

<form action="/cadastro/genero" method="POST">
    @csrf

    <div class="w-50">
        <label for="nome">Nome do Gênero:</label>
        <input type="text" name="nome" id="nome" class="form-control p-2" placeholder="Terror, animação...">
    </div>

    <input type="submit" value="Salvar" class="btn btn-success mt-2 w-50">
</form>




@endsection


