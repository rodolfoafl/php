<?php
require_once('../../functions.php');
$id = $_GET['id'];
$morador = find('moradores', $id);

$apartamento = find('apartamentos', $morador['id_apartamento']);
$usuario = find('usuarios', $morador['id_usuario']);
editarGenerico('morador', 'moradores');
?>

<?php 
$_GET['titulo'] = 'Editar Morador / ' . '<small>'.$morador['nome'].'</small>';
include(HEADER_TEMPLATE); ?>


<form action="editarMorador.php?id=<?php echo $morador['id']; ?>" method="post">
  
  <div class="row ">
  
  	<div class="form-group col-md-4">
    	<p>
    	Síndico? 
		<input type="checkbox" name="nivel" id="nivel" value="on" 
		<?php if($usuario['nivel'] == 1){?>
			checked
		<?php }?>
		/>
		</p>
	</div>
	</div>
  
  <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Nome: </label>
      <input type="text" class="form-control" name="morador['nome']" required value="<?php echo $morador['nome']; ?>">
    </div>
    
    <div class="form-group col-md-4">
      <label for="cpf">CPF: </label>
      <input type="text" class="form-control" name="morador['cpf']" required id="cpf" value="<?php echo $morador['cpf']; ?>"
      onchange="validarCPF(this.value)">
    </div>
    
    <div class="form-group col-md-4">
      <label for="condominio">Condomínio: </label>
		<?php echo $select = dropDown('condominios', 'morador', $apartamento['id_condominio']);?>
    </div>

	<div class="form-group col-md-4">	
    <label for="apartamentos">Apartamento</label>
    	<div class="form-group col-md-12" id="apartamentos">
    	<?php echo $select = dropDownApt('apartamentos', $apartamento['id_condominio'], 'morador', $morador['id_apartamento']);?>
 		</div>
 	</div>

    <div class="form-group col-md-2">
      <label for="status">Status: </label>
      <select class="custom-select" name="morador['status']">
        <option value="0" >Desativado</option>
        <option value="1" <?php  if($morador['status']) {
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