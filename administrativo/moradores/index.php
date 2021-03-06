<?php
require_once('../../functions.php');
$moradores = listar('moradores');

//print_r($_POST);

?>
<?php 
	$_GET['titulo'] = 'Moradores / <small>Lista</small>';

 ?>
<?php include(HEADER_TEMPLATE); ?>

<style>
	
</style>





<h2>Moradores</h2>
<div class="col-sm-12 text-right h2">
        <a class="btn btn-info my-2 my-sm-0" href="cadastrarMorador.php"><i class="fa fa-plus"></i> Novo Morador</a>
        <a class="btn btn-info my-2 my-sm-0" href="index.php" ><i class="fas fa-sync"></i> Atualizar</a>
</div>



<table class="table table-hover">
<thead class="bg-dark">
	<tr>
		<th>ID</th>
		<th>Nome</th>
		<th>CPF</th>
		<th>Status</th>
		<th>Apartamento</th>
		<th>Usuário</th>
		<th></th>
	</tr>
</thead>
<tbody>
<?php if ($moradores) : ?>
<?php foreach ($moradores as $morador) : ?>
	<tr>
		<td><?php echo $morador['id']; ?></td>
		<td><?php echo $morador['nome']; ?></td>
		<td><?php echo $morador['cpf']; ?></td>
		<td><?php if($morador['status']){
			echo 'Ativado';
		}else{
			echo 'Desativado';
		}?></td>
		<td><?php 
		
		$apartamento = detalhesGenerico($morador['id_apartamento'], 'apartamentos');
		echo $apartamento['numero'];
		
		?></td>
		<td><?php 
		
		$usuario = detalhesGenerico($morador['id_usuario'], 'usuarios');
		echo $usuario['login'];
		
		?></td>
		<td class="actions text-right">
			<a href="detalhesMorador.php?id=<?php echo $morador['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="editarMorador.php?id=<?php echo $morador['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-object="<?php echo $morador['id']; ?>"
			data-classe="morador">
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