<div class="modal fade" id="institutionShowModal" tabindex="-1" role="dialog" aria-labelledby="institutionShowModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      
      <div class="modal-header">

        <h5 class="modal-title" id="institutionShowModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      
      <div class="modal-body">
        
        <form class="form">

          <div class="form-group">
            <label for="name">Nome:&nbsp;</label>
            <input type="text" readonly class="form-control-plaintext" id="name" name="name">
          </div>
          
          <div class="form-group">
            <label for="cnpj">CNPJ:&nbsp;</label>
            <input type="text" readonly class="form-control-plaintext" id="cnpj" name="cnpj">
          </div>

          <div class="form-group">
              <label for="status">Status:&nbsp;</label>
              <input type="text" readonly class="form-control-plaintext" id="status" name="status">
          </div>

        </form>

      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Fechar</button>

      </div>
    
    </div>

  </div>

</div>
