@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')

@endsection

@section('conteudo')

<h2 class="title">Visualizar Filmes</h2>
<p class="text">Veja os filmes cadastrados no Cinenóiz.</p>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Titulo Filme</th>
            <th>Sinopse</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($filmes as $filme)
            <tr>
                <th><p class="text-table">{{ $filme->titulo }}</p></th>
                <th><p class="text-table"><textarea name="" id="">{{ $filme->sinopse }}</textarea></p></th>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection


