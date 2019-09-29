<div class="modal fade" id="studentUpdateModal" tabindex="-1" role="dialog" aria-labelledby="studentUpdateModalLabel" aria-hidden="true">
  
    <div class="modal-dialog" role="document">
      
      <div class="modal-content">
        
        <div class="modal-header">
  
          <h5 class="modal-title" id="studentUpdateModal">Atualizar instituição</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
  
        </div>
        
        <div class="modal-body">
          
          <form>
  
            <fieldset>

              <legend>Dados Pessoais</legend>
  
              <div class="form-group">
                <label for="name" class="col-form-label">Nome:&nbsp;</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              
              <div class="form-group">
                <label for="cpf" class="col-form-label">CPF:&nbsp;</label>
                <input type="text" class="form-control" id="cpf" name="cpf">
              </div>
    
              <div class="form-group">
                <label for="birth-date" class="col-form-label">Data de nascimento:&nbsp;</label>
                <input type="datetime" class="form-control" id="birth-date" name="birth-date">
              </div>
    
              <div class="form-group">
                <label for="email" class="col-form-label">Email:&nbsp;</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
  
            </fieldset>
  
            <fieldset>
  
              <legend>Contato</legend>
  
              <div class="form-group">
                <label for="phone" class="col-form-label">Telefone:&nbsp;</label>
                <input type="text" class="form-control" id="phone" name="phone">
              </div>
              
              <div class="form-group">
                <label for="mobile" class="col-form-label">Celular:&nbsp;</label>
                <input type="text" class="form-control" id="mobile" name="mobile">
              </div>
    
            </fieldset>
  
            <fieldset>
  
              <legend>Endereço</legend>
  
              <div class="form-group">
                <label for="zipcode" class="col-form-label">CEP:&nbsp;</label>
                <input type="text" class="form-control" id="zipcode" maxlength="8" name="zipcode">
              </div>
              
              <div class="form-group">
                <label for="street" class="col-form-label">Endereço:&nbsp;</label>
                <input type="text" readonly class="form-control-plaintext" id="street" name="street">
              </div>
    
              <div class="form-group">
                <label for="number" class="col-form-label">Nº:&nbsp;</label>
                <input type="text" class="form-control" id="number" name="number">
              </div>
    
              <div class="form-group">
                <label for="neighbour" class="col-form-label">Bairro:&nbsp;</label>
                <input type="text" readonly class="form-control-plaintext" id="neighbour" name="neighbour">
              </div>
    
              <div class="form-group">
                <label for="city" class="col-form-label">Cidade:&nbsp;</label>
                <input type="text" readonly class="form-control-plaintext" id="city" name="city">
              </div>
  
              <div class="form-group">
                <label for="state" class="col-form-label">Estado:&nbsp;</label>
                <input type="text" readonly class="form-control-plaintext" id="state" name="state">
              </div>
  
            </fieldset>
  
          </form>

          <div class="modal-footer">
  
            <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="submit" id="update" class="btn btn-success" data-dismiss="modal">Atualizar</button>

          </div>
  
        </div>
        
      </div>
  
    </div>
  
  </div>