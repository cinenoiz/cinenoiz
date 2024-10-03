@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')

@endsection

@section('conteudo')

<h2 class="title">Visualizar</h2>
<p class="text">Selecione a opção desejada:</p>

@php
    $links = [
        ['url' => '/admin/visualizar/cinema', 'label' => 'Cinemas'],
        ['url' => '/admin/visualizar/filme', 'label' => 'Filmes'],
        ['url' => '/admin/visualizar/genero', 'label' => 'Gêneros'],
        ['url' => '/admin/visualizar/produtora', 'label' => 'Produtoras'],
        ['url' => '/admin/visualizar/usuario', 'label' => 'Usuários'],
        ['url' => '/admin/visualizar/sessao', 'label' => 'Sessões'],
    ];
@endphp

<table class="table table-striped table-hover">
    <tbody>
        @foreach ($links as $link)
            <tr onclick="window.location='{{ $link['url'] }}';" style="cursor: pointer;">
                <th><p class="text-table">{{ $link['label'] }}</p></th>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection


