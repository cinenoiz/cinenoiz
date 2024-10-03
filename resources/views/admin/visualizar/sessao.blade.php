@extends('layouts.layout-admin')
@section('titulo', 'Cinenóiz | Admin')

@section('css')

@endsection

@section('conteudo')

<h2 class="title">Visualizar Sessões</h2>
<p class="text">Veja as sessões cadastradas no Cinenóiz.</p>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Cinema</th>
            <th>Filme</th>
            <th>Sala Sessão</th>
            <th>Data e Hora</th>
            <th>Ingressos</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sessoes as $sessao)
            <tr>
                <th><p class="text-table">{{ $sessao->cinema->nome }}</p></th>
                <th><p class="text-table">{{ $sessao->filme->titulo }}</p></th>
                <th><p class="text-table">{{ $sessao->sala }}</p></th>
                <th><p class="text-table">{{ $sessao->dia_e_hora }}</p></th>
                <th>
                    <button type="button" class="btn" data-sessao-id="{{ $sessao->id }}" onclick="openModal(this)">
                        <img src="{{ asset('icons/eye.png') }}" class="trash-icon">
                    </button>
                </th>
                <th>
                    <form action="/delete/sessao/{{ $sessao->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn">
                            <img src="{{ asset('icons/trash.png') }}" class="trash-icon">
                        </button>
                    </form>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="ingressosModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="ingressosModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ingressosModalLabel">Ingressos da Sessão</h5>
                <button type="button" class="close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome Usuário</th>
                            <th>CPF</th>
                            <th>Validado</th>
                        </tr>
                    </thead>
                    <tbody id="modal-ingressos-content">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Fechar</button>
            </div>
        </div>
    </div>
</div>



<script>
    function openModal(button) {
        let sessaoId = button.getAttribute('data-sessao-id');
        let modal = document.getElementById('ingressosModal');
        let tableBody = document.getElementById('modal-ingressos-content');
        tableBody.innerHTML = '';

        fetch('/sessao/' + sessaoId + '/ingressos')
            .then(response => response.json())
            .then(data => {
                if (data.ingressos.length > 0) {
                    data.ingressos.forEach(ingresso => {
                        let validado = ingresso.validado
                            ? '<span class="text-success">Sim</span>'
                            : '<span class="text-danger">Não</span>';
                        let row = `<tr>
                                        <td>${ingresso.nome_usuario}</td>
                                        <td>${ingresso.cpf_usuario}</td>
                                        <td>${validado}</td>
                                </tr>`;
                        tableBody.insertAdjacentHTML('beforeend', row);
                    });
                } else {
                    tableBody.innerHTML = '<tr><td colspan="3">Nenhum ingresso encontrado.</td></tr>';
                }
            })
            .catch(error => console.error('Erro ao carregar ingressos:', error));

        modal.style.display = 'block';
    }


    function closeModal() {
        let modal = document.getElementById('ingressosModal');
        modal.style.display = 'none';
    }

    window.onclick = (event) => {
        let modal = document.getElementById('ingressosModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }


</script>


@endsection




