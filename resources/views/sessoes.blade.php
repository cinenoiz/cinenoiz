@extends('layouts.layout')
@section('titulo', 'Cinenóiz | Sessões')


@section('css')
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
@endsection

@section('conteudo')
<section id="conteudo">
    <div class="container">

        @if (!isset($sessoes[0]->id))
            <h2 class="title">Nenhuma Sessão Encontrada para esse filme! =/</h2>
        @else

            <h2 class="title">{{$sessoes[0]->filme_titulo}}</h2>


            <div class="row">
                <div class="col-9">

                    <form action="/cadastro/ingresso" method="POST">
                        @csrf

                        <h4 class="text-white">Selecine uma sessão:</h4>
                        @foreach ($sessoes as $sessao)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sessao" id="sessao" value="{{ $sessao->id }}">
                                <label class="form-check-label text-white" for="sessao">{{ $sessao->cinema_nome }} - {{ $sessao->dia_e_hora }} - {{ $sessao->sala }}</label>
                            </div>
                        @endforeach

                        <h4 class="text-white mt-3">Dados Pessoais:</h4>

                        <label for="nome" class="text-white">Seu Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control w-50">


                        <label for="cpf" class="text-white mt-3">Seu CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control w-50">

                        <button type="submit" class="btn btn-success mt-3">Confirmar Presença</button>

                    </form>

                </div>
                <div class="col">
                    <img width="250px" src="{{ asset('/storage/' . $sessoes[0]->cartaz_path) }}" alt="">
                </div>
            </div>
        @endif

    </div>

</section>
@endsection

