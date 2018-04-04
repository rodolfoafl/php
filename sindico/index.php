<?php
require_once '../config.php';
require_once DBAPI;

$_GET['titulo'] = 'Dashboard';
$_SESSION['nivel_pagina'] = 1;

include(HEADER_TEMPLATE);
$db = open_database();
?>


<?php if($db): ?>
	<p>
			<strong>BEM VINDO. LOGADO COMO: SÍNDICO</strong>
		</p>	
<?php else : ?>		
	<div class="alert alert-danger" role="alert">			
		<p>
			<strong>ERRO:</strong> Não foi possível conectar ao banco de dados!
		</p>		
	</div>	
<?php endif; ?>	

<?php 
include(FOOTER_TEMPLATE); ?>
