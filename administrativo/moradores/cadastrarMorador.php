<?php
require_once('../../functions.php');
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
      <input type="text" class="form-control" name="morador['cpf']" required id="cpf" onchange="validarCPF(this.value)">
    </div>
    
    <div class="form-group col-md-4">
      	<input type="text" class="form-control" name="morador['id_usuario']" required id="id_usuario" hidden="">
    </div>
    
    <div class="form-group col-md-4">
      <label for="condominio">Condomínio</label>
		<?php echo $select = dropDown('condominios', 'morador');?>
    </div>
    	
    <div class="form-group col-md-4">	
    	<label for="apartamentos">Apartamento</label>
    	<div id="apartamentos">
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

  <div class="row ">
  
    <div class="form-group col-md-4 nivel">
    <input type="checkbox" name="nivel" id="nivel" value="on"/> Síndico
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
	var chbox = document.getElementById("nivel");
	var nivel = 2;
	if(chbox.checked){
		nivel = 1;
	}
		
    	$.ajax({
            type: 'post',
            url: 'fetch_data.php',
            dataType: 'JSON',
            data: {
             login: nome, nivel: nivel
            },
            success: function (response) {
            document.getElementById("usuario").value=response[0];  
            document.getElementById("senha").value=response[1];  
            document.getElementById("id_usuario").value=response[2];  
            }
        });
}

function validarCPF(cpf){ 
	$.ajax({
        type: 'post',
        url: 'fetch_data.php',
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