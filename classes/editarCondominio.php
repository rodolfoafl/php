<?php 
  require_once('functions.php'); 
  editar();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Condomínio</h2>

<form action="editarCondominio.php?id=<?php echo $condominio['id']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Nome: </label>
      <input type="text" class="form-control" name="condominio['nome']" value="<?php echo $condominio['nome']; ?>">
    </div>

    <div class="form-group col-md-6">
      <label for="campo2">Endereço: </label>
      <input type="text" class="form-control" name="condominio['endereco']" value="<?php echo $condominio['endereco']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Status: </label>
      <input type="text" class="form-control" name="condominio['status']" value="<?php echo $condominio['status']; ?>">
    </div>
  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>