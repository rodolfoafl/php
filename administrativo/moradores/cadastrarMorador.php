<?php
require_once('../functions.php');
adicionarGenerico('morador', 'moradores');
?>

<?php 
$_GET['titulo'] = 'Novo Morador';
include(HEADER_TEMPLATE); ?>

<form action="cadastrarMorador.php" method="post">
  <!-- area de campos do form -->
  
  <div class="row ">

    <div class="form-group col-md-4">
      <label for="name">Nome: </label>
      <input id="nome" type="text" class="form-control" name="morador['nome']" onchange="gerarusuario(this.value)" required>
    </div>
    
    <div class="form-group col-md-4">
      <label for="cpf">CPF: </label>
      <input type="text" class="form-control" name="morador['cpf']" required id="cpf">
    </div>

    <div class="form-group col-md-4">
      <label for="condominio">Condomínio</label>
		<?php echo $select = dropDown('condominios', 'morador');?>
    </div>
    	
    <div class="form-group col-md-4">	
    	<label for="apartamentos">Apartamento</label>
    	<div  id="apartamentos">
    	<select disabled class="form-control">
    	<option selected >Nenhum condominio selecionado!</option>
    	</select>
 		</div>
 	</div>

    <div class="form-group col-md-2">
      <label for="campo2">Status: </label>
      <select class="custom-select" name="morador['status']">
        <option value="0">Desativado</option>
        <option value="1">Ativado</option>
      </select>
    </div>
    
    <div class="form-group col-md-4">
      <input type="text" class="form-control" name="morador['id_usuario']" value="1" hidden="">
    </div>
  </div>
  
  <div class="row">
  	    <div class="form-group col-md-4">
      <label for="usuario">Usuário: </label>
      <input id="usuario" type="text" class="form-control" name="usuario['login']" required disabled>
    </div>
    
     <div class="form-group col-md-4">
      <label for="senha">Senha: </label>
      <input id="senha" type="text" class="form-control" name="usuario['senha']" required disabled>
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

<script type="text/javascript">
function fetch_select(val){
         $.ajax({
             type: 'post',
             url: 'fetch_data.php',
             data: {
              id_condominio: val
             },
             success: function (response) {
              document.getElementById("apartamentos").innerHTML=response; 
             }
         });
}

function gerarusuario(nome){ 
    	$.ajax({
            type: 'post',
            url: 'fetch_data.php',
            data: {
             usuario: nome
            },
            success: function (response) {
            document.getElementById("usuario").value=response;  
            document.getElementById("senha").value=response;  
            }
        });
}
</script>

<?php include(FOOTER_TEMPLATE); ?>
<script>
			$('#cpf').mask('000.000.000-00');
</script>