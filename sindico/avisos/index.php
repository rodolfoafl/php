<?php
require_once('../../administrativo/functions.php');
$avisos = listar('avisos');
?>
<?php 
	$_GET['titulo'] = 'Avisos';
  
 ?>
<?php 
include(HEADER_TEMPLATE); ?>

<style>
	
</style>
<h2>Avisos</h2>
<div class="col-sm-12 text-right h2">
        <a class="btn btn-info my-2 my-sm-0" href="cadastrarAviso.php"><i class="fa fa-plus"></i> Novo Aviso</a>
        <a class="btn btn-info my-2 my-sm-0" href="index.php" ><i class="fas fa-sync"></i> Atualizar</a>
</div>


<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
<?php endif; ?>





<table class="table table-hover">
<thead class="bg-dark">
	<tr>
		<th>Título</th>
		<th>Status</th>
		<th>Condomínio</th>
		<th></th>
	</tr>
</thead>
<tbody>
<?php if ($avisos) : ?>
<?php foreach ($avisos as $aviso) : ?>
	<tr>
	
		<td><?php echo $aviso['titulo']; ?></td>
		<td><?php if($aviso['status']){
			echo 'Ativado';
		}else{
			echo 'Desativado';
		}?></td>
		<td><?php 
		
		$condominio = detalhesGenerico($aviso['id_condominio'], 'condominios');
		echo $condominio['nome'];
		
		?></td>
		<td class="actions text-right">
			<a href="detalhesAviso.php?id=<?php echo $aviso['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="editarAviso.php?id=<?php echo $aviso['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-object="<?php echo $aviso['id']; ?>"
			data-classe="aviso">
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
include('../../administrativo/modal.php');
include(FOOTER_TEMPLATE); ?>