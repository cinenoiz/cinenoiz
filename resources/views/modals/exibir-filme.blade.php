<div class="modal fade modal-filme" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <button class="icon-close-div" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <img class="icon-close" src="{{ asset('icons/close.png') }}">
                </button>
            </div>
            <div class="modal-body container">

                <div class="row row-filme">
                    <div class="col">
                        <img src="{{ $foto1 }}" alt="" class="foto-filme">
                        <img src="{{ $foto2 }}" alt="" class="foto-filme">
                    </div>
                    <div class="col">
                        <h2 class="title">{{ $titulo }}</h2>
                        <p class="sinopse">{{ $sinopse }}</p>
                    </div>
                </div>

                <h2 class="title p-0 m-0 mt-3">Cinemas - {{ $titulo }}</h2>

                <div class="row mt-3">
                    <div class="col">
                        @foreach ($cinemas as $cinema)
                            <p class="sinopse">{{ $cinema->nome }}</p>
                        @endforeach
                    </div>
                    <div class="col">
                        <div class="mapa" id="map{{ $modalId }}"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>


    $('#{{ $modalId }}').on('shown.bs.modal', function () {
        var map = L.map('map{{ $modalId }}').setView([-23.55159053039954, -46.63249969482422], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var pontos = @json($cinemas)

        pontos.forEach(function(ponto) {
            L.marker([ponto.lat, ponto.lng]).addTo(map)
                .bindPopup(ponto.nome);
        });
    });

</script>
