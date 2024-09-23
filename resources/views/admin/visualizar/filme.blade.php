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
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($filmes as $filme)
            <tr>
                <th><p class="text-table">{{ $filme->titulo }}</p></th>
                <th><p class="text-table"><textarea name="" id="">{{ $filme->sinopse }}</textarea></p></th>
                <th>
                    <form action="/delete/filme/{{ $filme->id }}" method="POST">
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


