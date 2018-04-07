<?php
require_once('../functions.php');
$id = $_GET['id'];
$funcionario = find('funcionarios', $id);
editarGenerico('funcionario', 'funcionarios');
?>

<?php 
$_GET['titulo'] = 'Editar Funcionário / ' . '<small>'.$funcionario['nome'].'</small>';
include(HEADER_TEMPLATE); ?>


<form action="editarFuncionario.php?id=<?php echo $funcionario['id']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Nome: </label>
      <input type="text" class="form-control" name="funcionario['nome']" value="<?php echo $funcionario['nome']; ?>">
    </div>
    
    <div class="form-group col-md-4">
      <label for="cpf">CPF: </label>
      <input type="text" class="form-control" name="funcionario['cpf']" id="cpf" value="<?php echo $funcionario['cpf']; ?>" 
      onchange="validarCPF(this.value)">
    </div>
    
    <div class="form-group col-md-4">
      <label for="funcao">Função: </label>
      <input type="text" class="form-control" name="funcionario['funcao']" value="<?php echo $funcionario['funcao']; ?>">
    </div>

    <div class="form-group col-md-4">
      <label for="condominio">Condomínio: </label>
		<?php echo $select = dropDown('condominios','funcionario', $funcionario['id_condominio']);?>
    </div>

    <div class="form-group col-md-2">
      <label for="status">Status: </label>
      <select class="custom-select" name="funcionario['status']">
        <option value="0" >Desativado</option>
        <option value="1" <?php  if($funcionario['status']) {
          echo 'selected';
        } ?> >Ativado</option>
      </select>
    </div>
  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-info">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<script>
function validarCPF(cpf){ 
	$.ajax({
        type: 'post',
        url: '../moradores/fetch_data.php',
        data: {
         cpf: cpf
        },
        success: function (response) {
        	if(!response){
            	alert('CPF inválido!');
            	document.getElementById("cpf").value='';  
        	}
        }
    });
}
</script>

<?php include(FOOTER_TEMPLATE); ?>

<script>
			$('#cpf').mask('000.000.000-00');
</script>