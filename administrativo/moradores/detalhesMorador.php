<?php
require_once('../../functions.php');
$morador = detalhesGenerico($_GET['id'], 'moradores');
?>

<?php 
$_GET['titulo'] = 'Detalhes Morador / ' . '<small>'.$morador['nome'].'</small>';

session_start();
$_SESSION['nivel_pagina'] = 0;
include(HEADER_TEMPLATE); ?>




<h2>Morador: <?php echo $morador['nome']; ?></h2>

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
	
	
	<dt class="col-md-2">Usuário: </dt>
	<dd class="col-md-10"><?php 
	
	$usuario = detalhesGenerico($morador['id_usuario'], 'usuarios');
	echo $usuario['login'];
	
	?></dd>
</dl>

	

	



<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="editarMorador.php?id=<?php echo $morador['id']; ?>" class="btn btn-info">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>