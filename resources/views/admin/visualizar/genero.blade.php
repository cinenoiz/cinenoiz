@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')

@endsection

@section('conteudo')

<h2 class="title">Visualizar Gênero</h2>
<p class="text">Veja os gêneros cadastrados no Cinenóiz.</p>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nome Gênero</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($generos as $genero)
            <tr>
                <th><p class="text-table">{{ $genero->nome }}</p></th>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection


