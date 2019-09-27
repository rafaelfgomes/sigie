<div class="modal fade" id="institutionRegisterModal" tabindex="-1" role="dialog" aria-labelledby="institutionRegisterModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Cadastrar nova instituição</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      
      <div class="modal-body">
        
        <form>

          <div class="form-group">
            <label for="name" class="col-form-label">Nome:&nbsp;</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          
          <div class="form-group">
            <label for="cnpj" class="col-form-label">CNPJ:&nbsp;</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj">
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="status" name="status">
            <label class="form-check-label" for="status">
              Ativo
            </label>
          </div>

        </form>

      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-suucess">Cadastrar</button>

      </div>
    
    </div>

  </div>

</div>