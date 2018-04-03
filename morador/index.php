<?php
require_once '../config.php';
require_once DBAPI;

$_GET['titulo'] = 'Dashboard';

include(HEADER_TEMPLATE);
$db = open_database();
?>


<?php if($db): ?>
	<p>
			<strong>BEM VINDO. LOGADO COMO: MORADOR</strong>
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
