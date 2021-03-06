<?php
require_once('../../functions.php');
$funcionarios = listar('funcionarios');
?>
<?php 
	$_GET['titulo'] = 'Funcionários';
 ?>
<?php 
include(HEADER_TEMPLATE); ?>

<style>
	
</style>
<h2>Funcionarios</h2>
<div class="col-sm-12 text-right h2">
        <a class="btn btn-info my-2 my-sm-0" href="cadastrarFuncionario.php"><i class="fa fa-plus"></i> Novo Funcionario</a>
        <a class="btn btn-info my-2 my-sm-0" href="index.php" ><i class="fas fa-sync"></i> Atualizar</a>
</div>





<table class="table table-hover">
<thead class="bg-dark">
	<tr>
		<th>ID</th>
		<th>Nome</th>
		<th>CPF</th>
		<th>Função</th>
		<th>Status</th>
		<th>Condomínio</th>
		<th></th>
	</tr>
</thead>
<tbody>
<?php if ($funcionarios) : ?>
<?php foreach ($funcionarios as $funcionario) : ?>
	<tr>
		<td><?php echo $funcionario['id']; ?></td>
		<td><?php echo $funcionario['nome']; ?></td>
		<td><?php echo $funcionario['cpf']; ?></td>
		<td><?php echo $funcionario['funcao']; ?></td>
		<td><?php if($funcionario['status']){
			echo 'Ativado';
		}else{
			echo 'Desativado';
		}?></td>
		<td><?php 
		
		$condominio = detalhesGenerico($funcionario['id_condominio'], 'condominios');
		echo $condominio['nome'];
		
		?></td>
		<td class="actions text-right">
			<a href="detalhesFuncionario.php?id=<?php echo $funcionario['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="editarFuncionario.php?id=<?php echo $funcionario['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-object="<?php echo $funcionario['id']; ?>"
			data-classe="funcionario">
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