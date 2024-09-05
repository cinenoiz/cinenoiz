document.addEventListener('DOMContentLoaded', function() {
    updateFilmeText();

    const cropperConfig = {
        banner: { aspectRatio: 2.9 / 1, canvasWidth: 1920, canvasHeight: 662 },
        personagem: { aspectRatio: 1.79 / 1, canvasWidth: 1200, canvasHeight: 672 },
        cartaz: { aspectRatio: 0.78 / 1, canvasWidth: 759, canvasHeight: 972 },
        foto1: { aspectRatio: 1.75 / 1, canvasWidth: 700, canvasHeight: 400 },
        foto2: { aspectRatio: 1.75 / 1, canvasWidth: 700, canvasHeight: 400 },
    };

    function setupCropper(modalId, inputId, previewId, cropButtonId, imageId, configKey) {
        let cropper;
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const cropButton = document.getElementById(cropButtonId);
        const image = document.querySelector(imageId);

        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(preview, {
                    aspectRatio: cropperConfig[configKey].aspectRatio,
                    viewMode: 1,
                });
            };
            reader.readAsDataURL(file);
        });

        cropButton.addEventListener('click', function() {
            const canvas = cropper.getCroppedCanvas({
                width: cropperConfig[configKey].canvasWidth,
                height: cropperConfig[configKey].canvasHeight,
            });
            canvas.toBlob(function(blob) {
                const url = URL.createObjectURL(blob);
                image.src = url;
                const modal = bootstrap.Modal.getInstance(document.getElementById(modalId));
                modal.hide();
            });
        });
    }

    // Configuração específica para o modal banner
    const imageInputBanner = document.getElementById('imageInputBanner');
    const imagePreviewBanner = document.getElementById('imagePreviewBanner');
    const cropButtonBanner = document.getElementById('cropButtonBanner');
    const bannerImage = document.querySelector('#bannerImage');

    let cropperBanner;

    imageInputBanner.addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreviewBanner.src = e.target.result;
            if (cropperBanner) {
                cropperBanner.destroy();
            }
            cropperBanner = new Cropper(imagePreviewBanner, {
                aspectRatio: 2.9 / 1,
                viewMode: 1,
            });
        };
        reader.readAsDataURL(file);
    });

    cropButtonBanner.addEventListener('click', function() {
        const canvas = cropperBanner.getCroppedCanvas({
            width: 1920,
            height: 662,
        });

        const croppedImageDataURL = canvas.toDataURL('image/jpeg');
        bannerImage.style.backgroundImage = `url(${croppedImageDataURL})`;

        const modalBanner = bootstrap.Modal.getInstance(document.getElementById('imageCropperModalBanner'));
        modalBanner.hide();
    });

    // Configuração para os outros modais
    setupCropper('imageCropperModalPersonagem', 'imageInputPersonagem', 'imagePreviewPersonagem', 'cropButtonPersonagem', '#personagemImage', 'personagem');
    setupCropper('imageCropperModalCartaz', 'imageInputCartaz', 'imagePreviewCartaz', 'cropButtonCartaz', '#cartazImage', 'cartaz');
    setupCropper('imageCropperModal1', 'imageInputFoto1', 'imagePreviewFoto1', 'cropButtonFoto1', '.foto-filme:nth-of-type(1) img', 'foto1');
    setupCropper('imageCropperModal2', 'imageInputFoto2', 'imagePreviewFoto2', 'cropButtonFoto2', '.foto-filme:nth-of-type(2) img', 'foto2');

    VirtualSelect.init({
        ele: '#generos',
        placeholder: 'Selecione as opções de categoria',
        noSearchResultsTex: 'Nenhum resultado encontrado',
        noOptionsText: 'Nenhum resultado encontrado',
        searchPlaceholderText: 'Digite...',
        allOptionsSelectedText: 'Todas',
    });
});

document.addEventListener('DOMContentLoaded', function() {


    const filmeText = document.getElementById('filmeText');
    const produtoraText = document.getElementById('produtoraText');
    const sinopseText = document.getElementById('sinopseText');

    filmeText.addEventListener('dblclick', function() {
        const currentText = filmeText.innerText;
        const input = document.createElement('input');
        input.type = 'text';
        input.value = currentText;
        input.className = 'form-text-filme';

        filmeText.replaceWith(input);
        input.focus();

        input.addEventListener('blur', function() {
            filmeText.innerText = input.value;
            input.replaceWith(filmeText);
            updateFilmeText();
        });

        input.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                filmeText.innerText = input.value;
                input.replaceWith(filmeText);
                updateFilmeText();
            }
        });
    });

    sinopseText.addEventListener('dblclick', function() {
        const currentText = sinopseText.innerText;
        const textarea = document.createElement('textarea');
        textarea.value = currentText;
        textarea.className = 'form-sinopse-filme';

        sinopseText.replaceWith(textarea);
        textarea.focus();


        textarea.addEventListener('blur', function() {
            sinopseText.innerText = textarea.value;
            textarea.replaceWith(sinopseText);
        });
    });
});

const updateFilmeText = () => {
    const filmeInput = document.getElementById('filmeText').innerText;
    document.getElementById('titleFilme').innerText = filmeInput;
}
