<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modalId }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="image-container">
                    <input type="file" id="{{ $inputId }}" accept="image/*" />
                    <div>
                        <img id="{{ $previewId }}" style="max-width: 100%;" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="{{ $cropButtonId }}" class="btn btn-primary">Cortar e Aplicar</button>
            </div>
        </div>
    </div>
</div>
