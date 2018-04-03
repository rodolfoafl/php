<?php
	require_once 'config.php';
	require_once DBAPI;

	$_GET['titulo'] = 'Dashboard';
	
	include(HEADER_TEMPLATE);
	session_start();

?>
	<p>
		<strong>BEM VINDO. FAÇA O LOGIN</strong>
	</p>	
	<div class="login">
		<form class="f-login" method="post" action="autenticacao.php">
  			<div class="form-group">
    			<label for="exampleInputEmail1">Usuário</label>
    			<input type="text" class="form-control" id="usuario" name="usuario" required>
  			</div>
  			
  			<div class="form-group">
    			<label for="senha">Senha</label>
    			<input type="password" class="form-control" id="senha" name="senha" required>
  			</div>
 
  			<button type="submit" class="btn btn-info entrar">Entrar</button>
		</form>
	</div>
	
	<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg'];?>


<?php 
include(FOOTER_TEMPLATE); ?>
