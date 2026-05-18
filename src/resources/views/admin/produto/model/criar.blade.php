<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
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