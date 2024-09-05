@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')

@endsection

@section('conteudo')

<h2 class="title">Cadastro</h2>
<p class="text">Selecione a opção desejada:</p>

@php
    $links = [
        ['url' => '/admin/cadastro/cinema', 'label' => 'Cinema'],
        ['url' => '/admin/cadastro/filme', 'label' => 'Filme'],
        ['url' => '/admin/cadastro/genero', 'label' => 'Gênero'],
        ['url' => '/admin/cadastro/produtora', 'label' => 'Produtora'],
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


