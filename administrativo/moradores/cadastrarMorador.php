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
      <input type="text" class="form-control" name="morador['nome']" required>
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
    	<div class="form-group col-md-12" id="apartamentos">
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
      <input type="text" class="form-control" name="morador['id_usuario']" value="1" hidden>
    </div>
  </div>
  
  <div class="row">
  	    <div class="form-group col-md-4">
      <label for="usuario">Usuário: </label>
      <input type="text" class="form-control" name="usuario['login']" required disabled value="testeUsuario">
    </div>
    
     <div class="form-group col-md-4">
      <label for="senha">Senha: </label>
      <input type="text" class="form-control" name="usuario['senha']" required disabled value="testeSenha">
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
</script>

<?php include(FOOTER_TEMPLATE); ?>
<script>
			$('#cpf').mask('000.000.000-00');
</script>