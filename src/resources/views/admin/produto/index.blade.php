@extends('layout.admin')

@section('title', 'Produtos | Confeitaria Dashboard')

@section('pg-titulo', 'Produtos')

@section('link-topo', 'Produtos')

@section('content')

<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gerenciamento de Produtos</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-plus-circle"></i>
                            Novo Produto
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-sm" role="table">
                        <thead>
                            <tr>
                                <th style="width: 40px; text-align: center">Foto</th>
                                <th style="text-align: center;">Nome</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th style="width: 200px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produtos as $linha)
                            <tr class="align-middle">
                                <td>
                                    <img src="{{ asset('davilla/images/' . $linha->foto_produto) }}"
                                        width="60" height="60"
                                        style="object-fit: cover; border-radius: 4px; cursor: pointer;"
                                        onclick="abrirFoto(this.src)">
                                </td>
                                <td style="text-align: center;">{{ $linha->nome_produto }}</td>
                                <td>{{ $linha->descricao_produto }}</td>
                                <td>
                                    @if ($linha->status_produto == 'ATIVO')
                                    <span class="badge text-bg-success">Ativo</span>
                                    @else
                                    <span class="badge text-bg-danger">Inativo</span>
                                    @endif
                                </td>
                                <td>

                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarProduto{{ $linha->id_produto }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>

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
</div>

@include('admin.produto.model.criar')

@endsection