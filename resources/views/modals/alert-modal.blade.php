<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alertModalLabel">
          @if(session('success'))
            Sucesso
          @elseif(session('error'))
            Erro
          @endif
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(session('success'))
          {{ session('success') }}
        @elseif(session('error'))
          {{ session('error') }}
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

@section('scripts')
    @if (session('success') || session('error'))
        <script>
            const modal = new bootstrap.Modal(document.getElementById('alertModal'))
            modal.show()
        </script>
    @endif
@endsection
