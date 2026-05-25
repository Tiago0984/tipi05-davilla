<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" action="{{ route('admin.produto.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="card-body p-0">

            <div class="row">
              <div class="col-md-7 mb-3">
                <label for="nome_produto" class="form-label fw-bold">Nome</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" required placeholder="Ex: Bolo de Cenoura">
                <div class="form-text">Informe o nome do produto</div>
              </div>

              <div class="col-md-5 mb-3">
                <label for="id_categoria" class="form-label fw-bold">Categoria</label>
                <select class="form-select" id="id_categoria" name="id_categoria" required>
                  <option value="">Selecione a Categoria</option>
                  @foreach($categorias as $cat)
                  <option value="{{ $cat->id_categoria }}">{{ $cat->nome_categoria }}</option>
                  @endforeach
                </select>
                <div class="form-text">Selecione a categoria do produto</div>
              </div>
            </div>

            <div class="mb-3">
              <label for="descricao_produto" class="form-label fw-bold">Descrição</label>
              <textarea class="form-control" id="descricao_produto" name="descricao_produto" rows="3" placeholder="Detalhes do produto..."></textarea>
              <div class="form-text">Descrição do produto</div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="tamanho_produto" class="form-label fw-bold">Tamanho</label>
                <input type="text" class="form-control" id="tamanho_produto" name="tamanho_produto" placeholder="Ex: Médio, Pequeno, 350">
                <div class="form-text">Tamanho/Dimensão</div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="unid_medida_produto" class="form-label fw-bold">Unidade de Medida</label>
                <select class="form-select" id="unid_medida_produto" name="unid_medida_produto">
                  <option value="">Selecione</option>
                  <option value="UN">UN (Unidade)</option>
                  <option value="FT">FT (Fatia)</option>
                  <option value="CX">CX (Caixa)</option>
                  <option value="ML">ML (Mililitros)</option>
                  <option value="KG">KG (Quilo)</option>
                </select>
                <div class="form-text">Sigla da medida</div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="valor_produto" class="form-label fw-bold">Valor (R$)</label>
                <input type="number" step="0.01" class="form-control" id="valor_produto" name="valor_produto" required placeholder="0.00">
                <div class="form-text">Preço de venda</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="ordem_produto" class="form-label fw-bold">Ordem</label>
                <input type="number" id="ordem_produto" class="form-control" name="ordem_produto" placeholder="Ex: 1">
                <div class="form-text">Ordem de exibição</div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="status_produto" class="form-label fw-bold">Status</label>
                <select class="form-select" id="status_produto" name="status_produto" required>
                  <option value="ATIVO">ATIVO</option>
                  <option value="INATIVO">INATIVO</option>
                </select>
                <div class="form-text">Status no sistema</div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="destaque_produto" class="form-label fw-bold">Destaque</label>
                <select class="form-select" id="destaque_produto" name="destaque_produto" required>
                  <option value="NAO">NÃO</option>
                  <option value="SIM">SIM</option>
                </select>
                <div class="form-text">Exibir na Home?</div>
              </div>
            </div>

            <div class="mb-3">
              <label for="foto_produto" class="form-label fw-bold">Foto do Produto</label>
              <input type="file" class="form-control" id="foto_produto" name="foto_produto" accept="image/png,image/jpeg,image/webp" required>
              <div class="form-text">Selecione uma imagem quadrada (JPG, PNG, WEBP) de até 2MB</div>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar Produto</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div id="modalFoto" onclick="this.style.display='none'"
  style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
            background:rgba(0,0,0,0.8); z-index:9999; 
            justify-content:center; align-items:center; cursor:pointer;">
  <img id="modalFotoImg" src="" style="max-width:90%; max-height:90%; border-radius:8px;">

  <script>
    function abrirFoto(src) {
      document.getElementById('modalFotoImg').src = src;
      document.getElementById('modalFoto').style.display = 'flex';
    }
  </script>
</div>