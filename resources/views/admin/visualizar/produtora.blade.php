@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')

@endsection

@section('conteudo')

<h2 class="title">Visualizar Produtora</h2>
<p class="text">Veja as produtoras cadastradas no Cinenóiz.</p>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nome Produtora</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtoras as $produtora)
            <tr>
                <th><p class="text-table">{{ $produtora->nome }}</p></th>
                <th>
                    <form action="/delete/produtora/{{ $produtora->id }}" method="POST">
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


