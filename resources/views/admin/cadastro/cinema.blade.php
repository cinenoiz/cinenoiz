@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
@endsection

<script src="{{ asset('js/leaflet.js') }}"></script>

@section('conteudo')

<h2 class="title">Cadastro de Cinema</h2>
<p class="text">Preencha as caixas de texto e clique em salvar para cadastrar um novo cinema.</p>

<form action="/cadastro/cinema" method="POST">
    @csrf

    <div class="w-50">
        <label for="nome">Nome do Cinema:</label>
        <input type="text" name="nome" id="nome" class="form-control p-2" placeholder="">
    </div>

    <!-- Adicione mais campos de formulário aqui -->

    <div id="map" class="mt-2" style="height: 500px;"></div>

    <input type="hidden" name="latitude" id="latitude">
    <input type="hidden" name="longitude" id="longitude">


    <div class="w-50 mt-2">
        <div class="row">
            <div class="col">
                <label for="logradouro">Logradouro:</label>
                <input type="text" name="logradouro" id="logradouro" class="form-control p-2" placeholder="">
            </div>
            <div class="col-2">
                <label for="numero">Número:</label>
                <input type="text" name="numero" id="numero" class="form-control p-2" placeholder="">
            </div>
        </div>
    </div>

    <div class="w-50 mt-2">
        <label for="cep">CEP:</label>
        <input type="text" name="cep" id="cep" class="form-control p-2" placeholder="">
    </div>

    <div class="w-50 mt-2">
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" id="bairro" class="form-control p-2" placeholder="">
    </div>

    <div class="w-50 mt-2">
        <div class="row">
            <div class="col">
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="form-control p-2" placeholder="">
            </div>
            <div class="col-2">
                <label for="uf">UF:</label>
                <input type="text" name="uf" id="uf" class="form-control p-2" placeholder="">
            </div>
        </div>
    </div>

    <script>
        function getEndereco(latitude, longitude) {
            const url = `/api/endereco?lat=${latitude}&lng=${longitude}`;

            fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById('logradouro').value = data.logradouro || '';
                    document.getElementById('cep').value = data.cep || '';
                    document.getElementById('bairro').value = data.bairro || '';
                    document.getElementById('cidade').value = data.cidade.nome || '';
                    document.getElementById('uf').value = data.estado.sigla || '';
                }
            });
        }

        var map = L.map('map').setView([-23.55159053039954, -46.63249969482422], 10);
        var currentMarker = null;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            if (currentMarker) {
                map.removeLayer(currentMarker);
            }

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
            getEndereco(lat, lng)

            currentMarker = L.marker([lat, lng]).addTo(map)
                .bindPopup('Você selecionou este ponto.')
                .openPopup();
        });
    </script>

    <input type="submit" value="Salvar" class="btn btn-success mt-2 w-50">
</form>

@endsection
