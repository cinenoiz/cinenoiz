@extends('layouts.layout')
@section('titulo', 'Cinenóiz | Sessões')


@section('css')
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
<script src="{{ asset('js/qrcode.min.js') }}"></script>
@endsection

@section('conteudo')
<section id="conteudo">
    <div class="container">

        @if (!isset($ingresso->id))
            <h2 class="title">Nenhuma Ingresso Encontrado! =/</h2>
        @else

            <h2 class="title">Ingresso de {{ $ingresso->nome_usuario }}</h2>

            <div id="qrcode"></div>
        @endif

    </div>

</section>


@if (isset($ingresso->id))
<script>
    const qrcode = new QRCode(document.getElementById("qrcode"), {
        text: JSON.stringify({
            id: "{{ $ingresso->id }}"
        }),
        width: 256,
        height: 256,
        colorDark : "#ffffff",
	    colorLight : "#000",
    });
</script>
@endif

@endsection

