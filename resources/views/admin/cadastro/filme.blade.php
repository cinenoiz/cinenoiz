@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css"/>
<link rel="stylesheet" href="{{ asset('css/virtual-select.min.css') }}"/>
@endsection

@section('conteudo')

<h2 class="title">Cadastro de Filme</h2>
<p class="text">Clique nas sessões para modificar as informações do filme.</p>

<form id="filmForm">
    <div id="banner">
        <div class="swiper-slide">
            <div class="image-slide" id="bannerImage" style="background-image: url('{{ asset('image/banner3dtudo.png') }}');"></div>
            <div class="conteudo-slide">
                <div class="informacoes-filme">
                    <span id="produtoraText" class="bannerProdutoraText">Nome Produtora</span>
                    <h2 id="filmeText" class="bannerFilmeText" onchange="updateFilmeText()">Nome do Filme</h2>
                    <button disabled class="buttonIngresso">Garantir Ingresso</button>
                </div>
                <div class="personagem-filme">
                    <img id="personagemImage" src="{{ asset('image/examples/personagem.png') }}" alt="Personagem">
                </div>
            </div>
        </div>
    </div>

    <div class="button-group mt-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageCropperModalBanner">
            Editar Imagem do Banner
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageCropperModalPersonagem">
            Editar Imagem do Personagem
        </button>
    </div>

    <div class="w-100 mt-3">
        <label for="generos" class="text">Gênero do Filme:</label>
        <select multiple data-search="true" name="generos" id="generos">
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}">{{$genero->nome}}</option>
            @endforeach
        </select>
    </div>

    <div class="row w-100 mt-3">
        <div class="col">
            <label for="imageInputCartaz" class="text">Cartaz do Filme:</label>
            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#imageCropperModalCartaz">
                Editar Cartaz
            </button>
        </div>
        <div class="mt-2 col">
            <img id="cartazImage" src="{{ asset('image/examples/cartaz-filme.png') }}" alt="Cartaz do Filme" class="img-fluid"/>
        </div>
    </div>

    <div id="modal-filme-info" class="mt-3">
        <div class="row">
            <div class="col">
                @foreach (['Foto 1' => 'foto-filme.png', 'Foto 2' => 'foto-filme.png'] as $foto => $src)
                    <div class="foto-filme mt-3">
                        <img class="foto-filme-divulgacao" src="{{ asset('image/examples/' . $src) }}" alt="{{ $foto }}">
                        <div class="icon-div" data-bs-toggle="modal" data-bs-target="#imageCropperModal{{ $loop->index + 1 }}">
                            <img class="cam-icon" src="{{ asset('icons/cam.png') }}">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col">
                <h2 id="titleFilme" class="titleFilmeEdit mt-4">Nome Filme</h2>
                <p id="sinopseText" class="sinopseFilmeEdit mt-2">Digite a sinopse do filme de maneira linda e inspiradora! 🤩</p>
            </div>
        </div>
    </div>

    <!-- Botão para enviar o formulário -->
    <button type="submit" class="btn btn-success mt-4">Salvar Filme</button>
</form>

@include('modals.image-cropper', ['modalId' => 'imageCropperModalBanner', 'title' => 'Cortar Imagem do Banner', 'inputId' => 'imageInputBanner', 'previewId' => 'imagePreviewBanner', 'cropButtonId' => 'cropButtonBanner', 'imageId' => 'bannerImage', 'aspectRatio' => '2.9 / 1', 'canvasWidth' => 1920, 'canvasHeight' => 662])
@include('modals.image-cropper', ['modalId' => 'imageCropperModalPersonagem', 'title' => 'Cortar Imagem do Personagem', 'inputId' => 'imageInputPersonagem', 'previewId' => 'imagePreviewPersonagem', 'cropButtonId' => 'cropButtonPersonagem', 'imageId' => 'personagemImage', 'aspectRatio' => '1.79 / 1', 'canvasWidth' => 1200, 'canvasHeight' => 672])
@include('modals.image-cropper', ['modalId' => 'imageCropperModalCartaz', 'title' => 'Cortar Imagem do Cartaz', 'inputId' => 'imageInputCartaz', 'previewId' => 'imagePreviewCartaz', 'cropButtonId' => 'cropButtonCartaz', 'imageId' => 'cartazImage', 'aspectRatio' => '0.78 / 1', 'canvasWidth' => 759, 'canvasHeight' => 972])

@foreach ([1 => 'Foto 1', 2 => 'Foto 2'] as $index => $title)
    @include('modals.image-cropper', ['modalId' => "imageCropperModal$index", 'title' => "Editar $title", 'inputId' => "imageInputFoto$index", 'previewId' => "imagePreviewFoto$index", 'cropButtonId' => "cropButtonFoto$index", 'imageId' => ".foto-filme img[src='{{ asset('image/examples/foto-filme.png') }}']", 'aspectRatio' => '1.75 / 1', 'canvasWidth' => 700, 'canvasHeight' => 400])
@endforeach

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="{{ asset('js/virtual-select.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>

<script>
    const produtoras = @json($produtoras);
    const produtoraText = document.querySelector('#produtoraText');

    produtoraText.addEventListener('dblclick', function() {
        const select = document.createElement('select');
        select.className = 'form-combo-produtora';

        produtoras.forEach(function(produtora) {
            const option = document.createElement('option');
            option.value = produtora.id;
            option.text = produtora.nome;
            select.appendChild(option);
        });

        produtoraText.replaceWith(select);
        select.focus();

        select.addEventListener('blur', function() {
            const selectedOption = select.options[select.selectedIndex];
            produtoraText.innerText = selectedOption.text;
            produtoraText.setAttribute('data-id', selectedOption.value);
            select.replaceWith(produtoraText);
        });

        select.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                const selectedOption = select.options[select.selectedIndex];
                produtoraText.innerText = selectedOption.text;
                produtoraText.setAttribute('data-id', selectedOption.value);
                select.replaceWith(produtoraText);
            }
        });
    });
</script>


<script>
    function imageToBlob(imageElement) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.crossOrigin = "Anonymous";
            img.src = imageElement;

            img.onload = function() {
                const canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;

                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);

                canvas.toBlob(function(blob) {
                    if (blob) {
                        resolve(blob);
                    } else {
                        reject(new Error('Conversion to Blob failed'));
                    }
                }, 'image/png');
            };

            img.onerror = function() {
                reject(new Error('Image load error'));
            };
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('filmForm');
        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            const formData = new FormData(form);

            try {
                const bannerBlob = await imageToBlob(document.getElementById('bannerImage').style.backgroundImage.slice(5, -2));
                const personagemBlob = await imageToBlob(document.getElementById('personagemImage').src);
                const cartazBlob = await imageToBlob(document.getElementById('cartazImage').src);

                const imagem1Blob = await imageToBlob(document.querySelector('.foto-filme:nth-of-type(1) img').src);
                const imagem2Blob = await imageToBlob(document.querySelector('.foto-filme:nth-of-type(2) img').src);

                formData.append('imgBanner', bannerBlob, 'banner.png');
                formData.append('imgPersonagem', personagemBlob, 'personagem.png');
                formData.append('imgCartaz', cartazBlob, 'cartaz.png');
                formData.append('imgFilme1', imagem1Blob, 'filme1.png');
                formData.append('imgFilme2', imagem2Blob, 'filme2.png');

                console.log('Banner Blob:', bannerBlob);
console.log('Personagem Blob:', personagemBlob);
console.log('Cartaz Blob:', cartazBlob);
console.log('Imagem1 Blob:', imagem1Blob);
console.log('Imagem2 Blob:', imagem2Blob);



                const generos = document.querySelector('#generos').value;
                formData.append('generos', JSON.stringify(generos));
                formData.append('produtora', document.getElementById('produtoraText').getAttribute('data-id'));
                formData.append('titulo', document.getElementById('titleFilme').innerText);
                formData.append('sinopse', document.getElementById('sinopseText').innerText);

                const response = await fetch('/api/cadastro/filme', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                if (data.erro) {
                    alert('Erro ao salvar filme.');
                } else {
                    alert('Filme salvo com sucesso!');
                }
                console.log(data)

            } catch (error) {
                console.error('Erro:', error);
                alert('Ocorreu um erro ao salvar o filme.');
            }
        });
    });
</script>
@endsection
