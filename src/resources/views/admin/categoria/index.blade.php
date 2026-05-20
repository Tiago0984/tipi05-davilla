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
                                <!-- EDITAR -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria{{ $linha->id_categoria }}">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <!-- DESATIVAR -->
                                @if ($linha->status_categoria == 'ATIVO')
                                <form action="{{ route('admin.categoria.desativar', $linha->id_categoria) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                                @else
                                <form action="{{ route('admin.categoria.ativar', $linha->id_categoria) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>
                                </form>
                                @endif


                            </td>
                        </tr>
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
    // ALERTA SUCESSO
    setTimeout(function() {

        let alertaSucesso = document.getElementById('alertSucesso');

        if (alertaSucesso) {
            alertaSucesso.style.display = 'none';
        }

    }, 3000); // 3 segundos


    // ALERTA ERRO
    setTimeout(function() {

        let alertaErro = document.getElementById('alertErro');

        if (alertaErro) {
            alertaErro.style.display = 'none';
        }

    }, 3000); // 3 segundos
</script>

@include('admin.categoria.model.criar')

@endsection