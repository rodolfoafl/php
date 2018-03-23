<?php
require_once('../functions.php');
$apartamento = detalhesGenerico($_GET['id'], 'apartamentos');
?>

<?php 
$_GET['titulo'] = 'Detalhes Apartamento / ' . '<small>'.$apartamento['numero'].'</small>';
include(HEADER_TEMPLATE); ?>


<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="row">
	<dt class="col-md-2">ID: </dt>
	<dd class="col-md-10"><?php echo $apartamento['id']; ?></dd>

	<dt class="col-md-2">Número: </dt>
	<dd class="col-md-10"><?php echo $apartamento['numero']; ?></dd>

	<dt class="col-md-2">Condomínio: </dt>
	<dd class="col-md-10"><?php 
	
	$condominio = detalhesGenerico($apartamento['id_condominio'], 'condominios');
	echo $condominio['nome'];
	
	?></dd>

	<dt class="col-md-2">Status: </dt>
	<dd class="col-md-10"><?php if($apartamento['status']) {
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