<?php
    require_once('functions.php');
    index();
?>
<?php include(HEADER_TEMPLATE); ?>
<h1>Condominios</h1>
<hr/>
<?php if ($condominios) : ?>

	<div class="row">		
		<?php foreach ($condominios as $condominio) : ?>
			<?php if($condominio['status']): ?>
		<div class="card text-center">
			<?php else : ?>
				<div class="card text-center desativado">
					<?php endif; ?>
			<div class="card-header">
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
				<a href="apartamentos.php" class="btn btn-info">Unidades</a>
	<a href="#" class="btn btn-info">Editar</a>
	<a href="#" class="btn btn-danger">Excluir</a>
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
<?php include(FOOTER_TEMPLATE); ?>