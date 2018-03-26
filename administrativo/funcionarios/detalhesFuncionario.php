<?php
require_once('../functions.php');
$funcionario = detalhesGenerico($_GET['id'], 'funcionarios');
?>

<?php 
$_GET['titulo'] = 'Detalhes Funcionário / ' . '<small>'.$funcionario['nome'].'</small>';
include(HEADER_TEMPLATE); ?>


<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="row">
	<dt class="col-md-2">ID: </dt>
	<dd class="col-md-10"><?php echo $funcionario['id']; ?></dd>

	<dt class="col-md-2">Nome: </dt>
	<dd class="col-md-10"><?php echo $funcionario['nome']; ?></dd>
	
	<dt class="col-md-2">CPF: </dt>
	<dd class="col-md-10"><?php echo $funcionario['cpf']; ?></dd>
	
	<dt class="col-md-2">Função: </dt>
	<dd class="col-md-10"><?php echo $funcionario['funcao']; ?></dd>

	<dt class="col-md-2">Condomínio: </dt>
	<dd class="col-md-10"><?php 
	
	$condominio = detalhesGenerico($funcionario['id_condominio'], 'condominios');
	echo $condominio['nome'];
	
	?></dd>

	<dt class="col-md-2">Status: </dt>
	<dd class="col-md-10"><?php if($funcionario['status']) {
		echo "Ativado";
	} else {
		echo "Desativado";
	}?></dd>
</dl>

	

	



<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="editarFuncionario.php?id=<?php echo $funcionario['id']; ?>" class="btn btn-info">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>