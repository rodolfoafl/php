<?php
require_once('../functions.php');
adicionarGenerico('funcionario', 'funcionarios');

?>

<?php 
$_GET['titulo'] = 'Novo Funcionário';
include(HEADER_TEMPLATE); ?>

<form action="cadastrarFuncionario.php" method="post">
  <!-- area de campos do form -->
  
  <div class="row ">
    <div class="form-group col-md-4">
      <label for="name">Nome: </label>
      <input type="text" class="form-control" name="funcionario['nome']" required>
    </div>
    
    <div class="form-group col-md-4">
      <label for="cpf">CPF: </label>
      <input type="text" class="form-control" name="funcionario['cpf']" required id="cpf" onchange="validarCPF(this.value)">
    </div>
    
    <div class="form-group col-md-4">
      <label for="funcao">Função: </label>
      <input type="text" class="form-control" name="funcionario['funcao']" required>
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">Condomínio: </label>
		<?php echo $select = dropDown('condominios', 'funcionario');?>
    </div>

    <div class="form-group col-md-2">
      <label for="campo2">Status: </label>
      <select class="custom-select" name="funcionario['status']">
        <option value="0">Desativado</option>
        <option value="1">Ativado</option>
      </select>
    </div>
  </div>

  <div id="actions" class="row">     
    <div class="col-md-12">       
      <button type="submit" class="btn btn-info">Salvar
      </button>       
      <a href="index.php" class="btn btn-default">Cancelar
      </a>      
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