<?php
require_once('../functions.php');
$id = $_GET['id'];
$morador = find('moradores', $id);

$apartamento = find('apartamentos', $morador['id_apartamento']);
editarGenerico('morador', 'moradores');
?>

<?php 
$_GET['titulo'] = 'Editar Morador / ' . '<small>'.$morador['nome'].'</small>';
include(HEADER_TEMPLATE); ?>


<form action="editarMorador.php?id=<?php echo $morador['id']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Nome: </label>
      <input type="text" class="form-control" name="morador['nome']" value="<?php echo $morador['nome']; ?>">
    </div>
    
    <div class="form-group col-md-4">
      <label for="cpf">CPF: </label>
      <input type="text" class="form-control" name="morador['cpf']" value="<?php echo $morador['cpf']; ?>">
    </div>
    
    <div class="form-group col-md-4">
      <label for="condominio">Condomínio: </label>
		<?php echo $select = dropDown('apartamentos', 'morador', $morador['id_apartamento']);?>
    </div>

    <div class="form-group col-md-4">
      <label for="apartamento">Apartamento: </label>
		<?php echo $select = dropDown('apartamentos', 'morador', $morador['id_apartamento']);?>
    </div>

    <div class="form-group col-md-2">
      <label for="status">Status: </label>
      <select class="custom-select" name="morador['status']">
        <option value="0" >Desativado</option>
        <option value="1" <?php  if($morador['status']) {
          echo 'selected';
        } ?> >Ativado</option>
      </select>
    </div>
  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-info">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>