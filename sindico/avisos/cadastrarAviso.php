<?php
require_once('../../functions.php');
adicionarGenerico('aviso', 'avisos');

?>

<?php 
$_GET['titulo'] = 'Novo Aviso';
include(HEADER_TEMPLATE); ?>


<form action="cadastrarAviso.php" method="post">
  <!-- area de campos do form -->
  
  <div class="row ">
    <div class="form-group col-md-4">
      <label for="titulo">Título: </label>
      <input type="text" class="form-control" name="aviso['titulo']" required>
    </div>
    
    <div class="form-group col-md-12">
      <label for="descricao">Descrição: </label>
      <textarea class="form-control" rows="4" name="aviso['descricao']" id="descricao"></textarea>
    </div>

    <div class="form-group col-md-4">
      <label for="condominio">Condomínio: </label>
		<?php echo $select = dropDown('condominios', 'aviso');?>
    </div>

    <div class="form-group col-md-2">
      <label for="status">Status: </label>
      <select class="custom-select" name="aviso['status']">
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