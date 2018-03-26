<?php
require_once('../functions.php');
adicionarGenerico('apartamento', 'apartamentos');

?>

<?php 
$_GET['titulo'] = 'Novo Apartamento';
include(HEADER_TEMPLATE); ?>

<form action="cadastrarApartamento.php" method="post">
  <!-- area de campos do form -->
  
  <div class="row ">
    <div class="form-group col-md-4">
      <label for="name">Número </label>
      <input type="number" class="form-control" name="apartamento['numero']" required>
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">Condomínio: </label>
		<?php echo $select = dropDown('condominios', 'apartamento');?>
    </div>

    <div class="form-group col-md-2">
      <label for="campo2">Status: </label>
      <select class="custom-select" name="apartamento['status']">
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