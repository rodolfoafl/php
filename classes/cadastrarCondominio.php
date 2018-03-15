<?php 
  require_once('functions.php'); 
  adicionar();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Condomínio</h2>

<form action="cadastrarCondominio.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Nome: </label>
      <input type="text" class="form-control" name="condominio['nome']">
    </div>

    <div class="form-group col-md-6">
      <label for="campo2">Endereço: </label>
      <input type="text" class="form-control" name="condominio['endereco']">
    </div>

     <div class="form-group col-md-3">
      <label for="campo2">Status: </label>
      <input type="text" class="form-control" name="condominio['status']" value="1">
    </div>
  </div>

     <div id="actions" class="row">     
      <div class="col-md-12">       
        <button type="submit" class="btn btn-primary">Salvar
        </button>       
        <a href="index.php" class="btn btn-default">Cancelar
        </a>      
      </div>    
    </div>


</form>

<?php include(FOOTER_TEMPLATE); ?>