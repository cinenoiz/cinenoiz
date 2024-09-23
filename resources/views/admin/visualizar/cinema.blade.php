@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')

@endsection

@section('conteudo')

<h2 class="title">Visualizar Cinema</h2>
<p class="text">Veja os cinemas cadastrados no Cinenóiz.</p>


<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Logradouro</th>
            <th>Número</th>
            <th>CEP</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cinemas as $cinema)
            <tr>
                <th><p class="text-table">{{ $cinema->nome }}</p></th>
                <th><p class="text-table">{{ $cinema->logradouro }}</p></th>
                <th><p class="text-table">{{ $cinema->numero }}</p></th>
                <th><p class="text-table">{{ $cinema->cep }}</p></th>
                <th><p class="text-table">{{ $cinema->bairro }}</p></th>
                <th><p class="text-table">{{ $cinema->cidade }}</p></th>
                <th><p class="text-table">{{ $cinema->uf }}</p></th>
                <th><p class="text-table">{{ $cinema->latitude }}</p></th>
                <th><p class="text-table">{{ $cinema->longitude }}</p></th>

                <th>
                    <form action="/delete/cinema/{{ $cinema->id }}" method="POST">
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


