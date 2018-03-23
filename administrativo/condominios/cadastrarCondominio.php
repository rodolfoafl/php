<?php 
require_once('../functions.php'); 

    adicionarGenerico('condominio', 'condominios');
?>

<?php 
$_GET['titulo'] = 'Novo Condomínio';
include(HEADER_TEMPLATE); ?>

<form action="cadastrarCondominio.php" method="post">
  <!-- area de campos do form -->
  
  <div class="row ">
    <div class="form-group col-md-4">
      <label for="name">Nome: </label>
      <input type="text" class="form-control" name="condominio['nome']" required>
    </div>

    <div class="form-group col-md-6">
      <label for="campo2">Endereço: </label>
      <input type="text" class="form-control" name="condominio['endereco']" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo2">Status: </label>
      <select class="custom-select" name="condominio['status']">
        <option value="0">Desativado</option>
        <option value="1">Ativado</option>
      </select>
    </div>
  </div>

  <div id="actions" class="row">     
    <div class="col-md-12">       
      <button type="submit" class="btn btn-info">Salvar
      </button>       
      <a href="index.php" class="btn btn-default">Cancelar
      </a>      
    </div>    
  </div>


</form>

<?php include(FOOTER_TEMPLATE); ?>