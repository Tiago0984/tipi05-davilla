<!-- Modal -->
<div class="modal fade" id="modalEditarproduto{{ $produto->id_produto }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('admin.produto.update', $produto->id_produto) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nome_produto" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="{{ $produto->nome_produto }}">
                            <div id="emailHelp" class="form-text">
                                Informe o nome do produto
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descrição</label>
                                <textarea class="form-control" id="descricao_produto" name="descricao_produto" value="{{ $produto->descricao_produto }}">{{ $produto->descricao_produto }}</textarea>
                                <div id="emailHelp" class="form-text">
                                    Descrição do produto
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Ordem</label>
                                <input type="text" id="ordem_produto" class="form-control" name="ordem_produto" value="{{ $produto->ordem_produto }}">
                                <small class="text-muted">Informe a ordem do produto</small>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="status_produto" name="status_produto">
                                    <option value="">Selecione uma opção</option>
                                    <option value="ATIVO" {{ $produto->status_produto == 'ATIVO' ? 'selected' : '' }}>ATIVO</option>
                                    <option value="INATIVO" {{ $produto->status_produto == 'INATIVO' ? 'selected' : '' }}>INATIVO</option>
                                </select>
                                <small class="text-muted">Informe o status do produto</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>