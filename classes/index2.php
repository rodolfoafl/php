<?php
    require_once('functions.php');
    index();
?>
<?php 
	$_GET['titulo'] = 'Condominios / <small>Cards</small>';
    $_GET['cadastrar'] = 'cadastrarCondominio';
    $_GET['atualizar'] = 'index2';
    $_GET['modo'] = 'index';
 ?>
<?php include(HEADER_TEMPLATE); ?>


<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>



<?php if ($condominios) : ?>

	<div class="row">		
		<?php foreach ($condominios as $condominio) : ?>
			<?php if($condominio['status']): ?>
		<div class="card text-center">
			<?php else : ?>
				<div class="card text-center desativado">
					<?php endif; ?>
			<div class="card-header bg-dark">
				Condominio: <?php echo $condominio['id']; ?>
			</div>
			<div class="card-body">
				<h5 class="card-title"><?php echo $condominio['nome']; ?></h5>
				<p class="card-text"><?php echo $condominio['endereco']; ?></p>
				<?php if($condominio['status']): ?>
				<p class="card-text">Ativo</p>
			<?php else : ?>
				<p class="card-text">Desativado</p>
				<?php endif; ?>
				<a href="detalhesCondominio.php?id=<?php echo $condominio['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
	<a href="editarCondominio.php?id=<?php echo $condominio['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
	<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-object="<?php echo $condominio['id']; ?>"><i class="fa fa-trash"></i> Excluir</a>
			</div>
			<div class="card-footer text-muted">
				Data da ultima modificação: 20/03/2015
			</div>
		</div>	
<?php endforeach; ?>
	</div>		

<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>

<?php
include('modal.php');
include(FOOTER_TEMPLATE); ?>