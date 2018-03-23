<?php 
	require_once('../functions.php'); 
	$condominio = detalhesGenerico($_GET['id'], 'condominios');
?>

<?php 
$_GET['titulo'] = 'Detalhes Condominio / ' . '<small>'.$condominio['nome'].'</small>';
include(HEADER_TEMPLATE); ?>


<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="row">
	<dt class="col-md-2">ID: </dt>
	<dd class="col-md-10"><?php echo $condominio['id']; ?></dd>

	<dt class="col-md-2">Nome: </dt>
	<dd class="col-md-10"><?php echo $condominio['nome']; ?></dd>

	<dt class="col-md-2">Endereço: </dt>
	<dd class="col-md-10"><?php echo $condominio['endereco']; ?></dd>

	<dt class="col-md-2">Status: </dt>
	<dd class="col-md-10"><?php if($condominio['status']) {
		echo "Ativado";
	} else {
		echo "Desativado";
	}?></dd>
</dl>

	

	



<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="editarCondominio.php?id=<?php echo $condominio['id']; ?>" class="btn btn-info">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>