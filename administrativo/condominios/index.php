<?php
require_once('../../functions.php');
$condominios = listar('condominios');
?>

<?php 
	$_GET['titulo'] = 'Condomínios';
	include(HEADER_TEMPLATE); ?>

<style>
	
</style>


<h2>Condominios</h2>
<div class="col-sm-12 text-right h2">
        <a class="btn btn-info my-2 my-sm-0" href="cadastrarCondominio.php"><i class="fa fa-plus"></i> Novo Condominio</a>
        <a class="btn btn-info my-2 my-sm-0" href="index.php" ><i class="fas fa-sync"></i> Atualizar</a>
</div>



<table class="table table-hover">
<thead class="bg-dark">
	<tr>
		<th>ID</th>
		<th width="30%">Nome</th>
		<th>Endereço</th>
		<th>Status</th>
		<th></th>
	</tr>
</thead>
<tbody>
<?php if ($condominios) : ?>
<?php foreach ($condominios as $condominio) : ?>
	<tr>
		<td><?php echo $condominio['id']; ?></td>
		<td><?php echo $condominio['nome']; ?></td>
		<td><?php echo $condominio['endereco']; ?></td>
		<td><?php if($condominio['status']){
			echo 'Ativado';
		}else{
			echo 'Desativado';
		}?></td>
		<td class="actions text-right">
			<a href="detalhesCondominio.php?id=<?php echo $condominio['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="editarCondominio.php?id=<?php echo $condominio['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-object="<?php echo $condominio['id']; ?>"
			data-classe="condominio">
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