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
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($generos as $genero)
            <tr>
                <th><p class="text-table">{{ $genero->nome }}</p></th>
                <th>
                    <form action="/delete/genero/{{ $genero->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn">
                            <img src="{{ asset('icons/trash.png') }}" class="trash-icon">
                        </button>
                    </form>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection


