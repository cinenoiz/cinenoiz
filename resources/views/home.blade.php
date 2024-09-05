@extends('layouts.layout')
@section('titulo', 'Cinenóiz | Home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
@endsection


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

                        <button class="buttonIngresso">Garantir Ingresso</button>

                    </div>

                    <div class="personagem-filme">
                        <img src="{{ asset('/storage/'.$filme->personagem_path) }}">

                    </div>

                </div>
            </div>

            @endforeach


        </div>

        <div class="swiper-pagination"></div>

    </div>

    <div id="cartaz">
        <h2 class="titleh2">Filmes em Cartaz:</h2>

        <div class="banner-section">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide card-filme">
                        <img src="{{ asset('image/coraline.jpg') }}" alt="Filme 1">
                        <div class="overlay">
                            <h3>Coraline</h3>
                            <button class="btn-watch">Reservar Assento</button>
                        </div>
                    </div>
                    <div class="swiper-slide card-filme">
                        <img src="{{ asset('image/fantasmas.jpg') }}" alt="Filme 2">
                        <div class="overlay">
                            <h3>Os Fantasmas Ainda Se Divertem</h3>
                            <button class="btn-watch">Reservar Assento</button>
                        </div>
                    </div>
                    <div class="swiper-slide card-filme"><img src="{{ asset('image/maxxine.jpg') }}" alt="Filme 3"></div>
                    <div class="swiper-slide card-filme"><img src="{{ asset('image/sorri.jpg') }}" alt="Filme 4"></div>
                    <div class="swiper-slide card-filme"><img src="{{ asset('image/twisters.jpg') }}" alt="Filme 5"></div>
                    <div class="swiper-slide card-filme"><img src="{{ asset('image/wicked.jpg') }}" alt="Filme 6"></div>
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

</section>


</section>
@endsection



@section('scripts')
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
@endsection
