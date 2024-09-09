@extends('layouts.layout')
@section('titulo', 'Cinenóiz | Home')


@section('css')
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
@endsection

@php
    $modals = '';
@endphp



@section('conteudo')
<section id="conteudo">

    <section id="banner" class="banner swiper">

        <div class="swiper-wrapper">


            @foreach ($filmes_destaque as $filme)

            <div class="swiper-slide" style="">
                <div class="image-slide" style="background-image: url('{{ asset('/storage/'.$filme->banner_path) }}');"></div>

                <div class="conteudo-slide">
                    <div class="informacoes-filme">

                        <span class="bannerProdutoraText">{{ $filme->produtora_nome }}</span>
                        <h2 class="bannerFilmeText">{{ $filme->titulo }}</h2>

                        <button class="buttonIngresso" data-bs-toggle="modal" data-bs-target="#modal-{{ $filme->id }}">Garantir Ingresso</button>

                    </div>

                    <div class="personagem-filme">
                        <img src="{{ asset('/storage/'.$filme->personagem_path) }}">

                    </div>

                </div>
            </div>

            @php
                $modals .= view('modals.exibir-filme', [
                    'modalId' => 'modal-' . $filme->id,
                    'titulo' => $filme->titulo,
                    'foto1' => asset('/storage/'.$filme->filme1_path),
                    'foto2' => asset('/storage/'.$filme->filme2_path),
                    'sinopse' => $filme->sinopse,
                    'cinemas' => $cinemas
                ])->render();
            @endphp

            @endforeach


        </div>

        <div class="swiper-pagination"></div>

    </div>

    <div id="cartaz">
        <h2 class="titleh2">Filmes em Cartaz:</h2>


        <div class="banner-section">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    @foreach ($outros_filmes as $filme)
                        <div class="swiper-slide card-filme">
                            <img src="{{ asset('/storage/'.$filme->cartaz_path) }}" alt="Cartaz do Filme">
                            <div class="overlay">
                                <h3>{{ $filme->titulo }}</h3>
                                <button class="btn-watch" data-bs-toggle="modal" data-bs-target="#modal-{{ $filme->id }}">Reservar Assento</button>
                            </div>
                        </div>

                        @php
                            $modals .= view('modals.exibir-filme', [
                                'modalId' => 'modal-' . $filme->id,
                                'titulo' => $filme->titulo,
                                'foto1' => asset('/storage/'.$filme->filme1_path),
                                'foto2' => asset('/storage/'.$filme->filme2_path),
                                'sinopse' => $filme->sinopse,
                                'cinemas' => $cinemas
                            ])->render();
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>



    </div>

    <div id="3d">

        <div id="banner-3d">

            <div class="div-imagens-banner">

                <h2 class="title3d">Salas 3D</h2>

                <img src="{{ asset('image/banner3dtudo.png') }}" class="banner-3d-tudo">


                <img src="{{ asset('image/banner3dpessoas.png') }}" class="banner-3d-pessoas">
            </div>

        </div>

    </div>

    <div id="cartaz">
        <h2 class="titleh2">Para a Família:</h2>


        <div class="banner-section">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    @foreach ($para_familia as $filme)
                        <div class="swiper-slide card-filme">
                            <img src="{{ asset('/storage/'.$filme->cartaz_path) }}" alt="Cartaz do Filme">
                            <div class="overlay">
                                <h3>{{ $filme->titulo }}</h3>
                                <button class="btn-watch"  data-bs-toggle="modal" data-bs-target="#modal-{{ $filme->id }}">Encontrar Assentos</button>
                            </div>
                        </div>

                        @php
                            $modals .= view('modals.exibir-filme', [
                                'modalId' => 'modal-' . $filme->id,
                                'titulo' => $filme->titulo,
                                'foto1' => asset('/storage/'.$filme->filme1_path),
                                'foto2' => asset('/storage/'.$filme->filme2_path),
                                'sinopse' => $filme->sinopse,
                                'cinemas' => $cinemas
                            ])->render();
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>



    </div>

    <div class="mt-5 mb-5"></div>

</section>


</section>

{!! $modals !!}
@endsection



@section('scripts')
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
@endsection
