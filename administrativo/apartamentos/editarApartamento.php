<?php
require_once('../../functions.php');
$id = $_GET['id'];
$apartamento = find('apartamentos', $id);
editarGenerico('apartamento', 'apartamentos');
?>

<?php 
$_GET['titulo'] = 'Editar Apartamento / ' . '<small>'.$apartamento['numero'].'</small>';
include(HEADER_TEMPLATE); ?>


<form action="editarApartamento.php?id=<?php echo $apartamento['id']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Número: </label>
      <input type="number" class="form-control" name="apartamento['numero']" value="<?php echo $apartamento['numero']; ?>">
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">Condomínio: </label>
		<?php echo $select = dropDown('condominios', 'apartamento', $apartamento['id_condominio']);?>
    </div>

    <div class="form-group col-md-2">
      <label for="campo2">Status: </label>
      <select class="custom-select" name="apartamento['status']">
        <option value="0" >Desativado</option>
        <option value="1" <?php  if($apartamento['status']) {
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