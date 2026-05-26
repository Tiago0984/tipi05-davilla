@extends('layout.admin')

@section('title', 'Categoria | Confeitaria Dashboard')

@section('pg-titulo', 'Categoria')

@section('link-topo', 'Categoria')

@section('content')

<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">

            @if (session('success'))
            <div class="alert alert-success" id="alertSucesso" role="alert">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger" id="alertErro" role="alert">
                <strong>Atenção</strong> verifique os campos do formulário.
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gerenciamento de categorias</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-plus-circle"></i>
                            Nova Categoria
                        </button>
                    </div>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-sm" role="table">
                    <thead>
                        <tr>
                            <th style="width: 40px">Ordem</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th style="width: 200px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categorias as $linha)
                        <tr class="align-middle">
                            <td>{{ $linha->ordem_categoria }}</td>
                            <td>{{ $linha->nome_categoria }}</td>
                            <td>{{ $linha->descricao_categoria }}</td>
                            <td>
                                @if ($linha->status_categoria == 'ATIVO')
                                <span class="badge text-bg-success">Ativo</span>
                                @else
                                <span class="badge text-bg-danger">Inativo</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">

<<<<<<< HEAD
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria{{ $linha->id_categoria }}">
=======
                                    <button type="button" class="bi bi-arrow-counterclockwise" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria{{ $linha->id_categoria }}">
>>>>>>> 1e56b113d12b6a31cd9ead1f38408416e770297c
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    @if ($linha->status_categoria == 'ATIVO')
                                    <form action="{{ route('admin.categoria.desativar', $linha->id_categoria) }}" method="post" class="m-0">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-check form-switch fs-5 m-0">
                                            <input class="form-check-input bg-success"
                                                type="checkbox"
                                                role="switch"
                                                checked
                                                onchange="this.form.submit()"
                                                style="cursor: pointer;"
                                                title="Clique para desativar">
                                        </div>
                                    </form>
                                    @else
                                    <form action="{{ route('admin.categoria.ativar', $linha->id_categoria) }}" method="post" class="m-0">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-check form-switch fs-5 m-0">
                                            <input class="form-check-input bg-danger"
                                                type="checkbox"
                                                role="switch"
                                                onchange="this.form.submit()"
                                                style="cursor: pointer;"
                                                title="Clique para ativar">
                                        </div>
                                    </form>
                                    @endif

<<<<<<< HEAD
=======
                                    @if ($linha->status_categoria == 'ATIVO')
                                    <form action="{{ route('admin.categoria.desativar', $linha->id_categoria) }}" method="post" class="m-0">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-check form-switch fs-5 m-0">
                                            <input class="form-check-input bg-success"
                                                type="checkbox"
                                                role="switch"
                                                checked
                                                onchange="this.form.submit()"
                                                style="cursor: pointer;"
                                                title="Clique para desativar">
                                        </div>
                                    </form>
                                    @else
                                    <form action="{{ route('admin.categoria.ativar', $linha->id_categoria) }}" method="post" class="m-0">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-check form-switch fs-5 m-0">
                                            <input class="form-check-input bg-danger"
                                                type="checkbox"
                                                role="switch"
                                                onchange="this.form.submit()"
                                                style="cursor: pointer;"
                                                title="Clique para ativar">
                                        </div>
                                    </form>
                                    @endif

>>>>>>> 1e56b113d12b6a31cd9ead1f38408416e770297c
                                </div>
                            </td>
                        </tr>
                        @include('admin.categoria.model.editar', ['categoria' => $linha])
                        @empty
                        <tr>
                            <td>Nenhuma categoria cadastrada.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script>
    // Função que faz o elemento desaparecer suavemente
    function sumirSuavemente(idElemento) {
        let alerta = document.getElementById(idElemento);

        if (alerta) {
            // 1. Adiciona a transição no estilo do elemento (dura meio segundo)
            alerta.style.transition = 'opacity 0.5s ease';

            // 2. Muda a opacidade para 0 (faz ele ficar transparente suavemente)
            alerta.style.opacity = '0';

            // 3. Espera os 500ms da animação terminarem e então remove o espaço dele na tela
            setTimeout(function() {
                alerta.style.display = 'none';
            }, 500);
        }
    }

    // ALERTA SUCESSO
    setTimeout(function() {
        sumirSuavemente('alertSucesso');
    }, 3000); // Inicia após 3 segundos

    // ALERTA ERRO
    setTimeout(function() {
        sumirSuavemente('alertErro');
    }, 3000); // Inicia após 3 segundos
</script>

@include('admin.categoria.model.criar')

@endsection