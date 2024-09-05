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
        </tr>
    </thead>
    <tbody>
        @foreach ($produtoras as $produtora)
            <tr>
                <th><p class="text-table">{{ $produtora->nome }}</p></th>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection


