<?php
require_once('../../administrativo/functions.php');
$apartamentos = listar('apartamentos');
?>
<?php 
	$_GET['titulo'] = 'Apartamentos';

 ?>
<?php include(HEADER_TEMPLATE); ?>

<style>
	
</style>


<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<h2>Apartamentos</h2>
<div class="col-sm-12 text-right h2">
        <a class="btn btn-info my-2 my-sm-0" href="cadastrarApartamento.php"><i class="fa fa-plus"></i> Novo Apartamento</a>
        <a class="btn btn-info my-2 my-sm-0" href="index.php" ><i class="fa fa-refresh"></i> Atualizar</a>
</div>




<table class="table table-hover">
<thead class="bg-dark">
	<tr>
		<th>ID</th>
		<th>Número</th>
		<th>Status</th>
		<th>Condomínio</th>
		<th></th>
	</tr>
</thead>
<tbody>
<?php if ($apartamentos) : ?>
<?php foreach ($apartamentos as $apartamento) : ?>
	<tr>
		<td><?php echo $apartamento['id']; ?></td>
		<td><?php echo $apartamento['numero']; ?></td>
		<td><?php if($apartamento['status']){
			echo 'Ativado';
		}else{
			echo 'Desativado';
		}?></td>
		<td><?php 
		
		$condominio = detalhesGenerico($apartamento['id_condominio'], 'condominios');
		echo $condominio['nome'];
		
		?></td>
		<td class="actions text-right">
			<a href="detalhesApartamento.php?id=<?php echo $apartamento['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="editarApartamento.php?id=<?php echo $apartamento['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-object="<?php echo $apartamento['id']; ?>"
			data-classe="apartamento">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php
include('../modal.php');
include(FOOTER_TEMPLATE); ?>