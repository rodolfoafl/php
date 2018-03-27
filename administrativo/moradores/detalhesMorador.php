<?php
require_once('../functions.php');
$morador = detalhesGenerico($_GET['id'], 'moradores');
?>

<?php 
$_GET['titulo'] = 'Detalhes Morador / ' . '<small>'.$morador['nome'].'</small>';
include(HEADER_TEMPLATE); ?>


<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="row">
	<dt class="col-md-2">ID: </dt>
	<dd class="col-md-10"><?php echo $morador['id']; ?></dd>

	<dt class="col-md-2">Nome: </dt>
	<dd class="col-md-10"><?php echo $morador['nome']; ?></dd>
	
	<dt class="col-md-2">CPF: </dt>
	<dd class="col-md-10"><?php echo $morador['cpf']; ?></dd>
	
	<dt class="col-md-2">Apartamento: </dt>
	<dd class="col-md-10"><?php 
	
	$apartamento = detalhesGenerico($morador['id_apartamento'], 'apartamentos');
	echo $apartamento['numero'];
	
	?></dd>

	<dt class="col-md-2">Status: </dt>
	<dd class="col-md-10"><?php if($morador['status']) {
		echo "Ativado";
	} else {
		echo "Desativado";
	}?></dd>
</dl>

	

	



<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="editarApartamento.php?id=<?php echo $apartamento['id']; ?>" class="btn btn-info">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>