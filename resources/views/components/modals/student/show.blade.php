<div class="modal fade" id="studentShowModal" tabindex="-1" role="dialog" aria-labelledby="studentShowModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      
      <div class="modal-header">

        <h5 class="modal-title" id="studentShowModalLabel"></h5>
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
            <label for="cpf">CPF:&nbsp;</label>
            <input type="text" readonly class="form-control-plaintext" id="cpf" name="cpf">
          </div>

          <div class="form-group">
            <label for="birth-date">Data de nascimento:&nbsp;</label>
            <input type="text" readonly class="form-control-plaintext" id="birth-date" name="birth-date">
          </div>
        
          <div class="form-group">
            <label for="email">Email:&nbsp;</label>
            <input type="text" readonly class="form-control-plaintext" id="email" name="email">
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
