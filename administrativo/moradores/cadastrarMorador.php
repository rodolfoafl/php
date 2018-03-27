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
      <input type="number" class="form-control" name="morador['nome']" required>
    </div>
    
    <div class="form-group col-md-4">
      <label for="cpf">CPF: </label>
      <input type="text" class="form-control" name="morador['cpf']" required>
    </div>

    <div class="form-group col-md-4">
      <label for="condominio">Condomínio</label>
		<?php echo $select = dropDown('condominios', 'morador');?>
    </div>
    
    <div class="form-group col-md-4" id="apt" style="display: none;">
      <label for="apartamento">Apartamento</label>
      <?php $abc = "<script>id</script>";
    echo $abc;?>
		
    </div>
    
   
    
    <div class="form-group col-md-4">
      <label for="usuario">Usuário: </label>
      <input type="text" class="form-control" name="usuario['login']" required disabled>
    </div>
    
     <div class="form-group col-md-4">
      <label for="senha">Senha: </label>
      <input type="text" class="form-control" name="usuario['senha']" required disabled>
    </div>
    

    <div class="form-group col-md-2">
      <label for="campo2">Status: </label>
      <select class="custom-select" name="apartamento['status']">
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

<script type = "text/javascript">

var id;
function getId(s){
 id = s[s.selectedIndex].value;
 var div = document.getElementById("apt");
 div.style.display = "";
 
 
 //alert(id);

}
</script>

<?php include(FOOTER_TEMPLATE); ?>