<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{ route('admin.categoria.store') }}">
          @csrf
          <div class="card-body">
            <div class="mb-3">
              <label for="nome_categoria" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome_categoria" name="nome_categoria">
              <div id="emailHelp" class="form-text">
                Informe o nome da categoria
              </div>
            </div>
            <div class="mb-3">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="descricao_categoria" name="descricao_categoria" rows="3"></textarea>
                <div id="emailHelp" class="form-text">
                  Descrição da categoria
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 mb-3">
                <label class="form-label">Ordem</label>
                <input type="text" id="ordem_categoria" class="form-control" name="ordem_categoria">
                <small class="text-muted">Informe a ordem da categoria</small>
              </div>
              <div class="col-6 mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" id="status_categoria" name="status_categoria">
                  <option value="">Selecione uma opção</option>
                  <option value="ATIVO">ATIVO</option>
                  <option value="INATIVO">INATIVO</option>
                </select>
                <small class="text-muted">Informe o status da categoria</small>
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