<?php
require_once '../config.php';
require_once DBAPI;

$_GET['titulo'] = 'Dashboard';


include(HEADER_TEMPLATE);
$db = open_database();
?>


<?php if($db): ?>
	<p>
			<strong>BEM VINDO. LOGADO COMO: SÍNDICO</strong>
			
			<div class="row">		
		<div class="col-xs-6 col-sm-3 col-md-2">			
			<a href="avisos/index.php" class="btn btn-warning">				
				
				<div class="col-xs-12 text-center">						
						<i class="fas fa-exclamation fa-5x"></i>						
					</div>		
									
					<div class="col-xs-12 text-center">						
						<p>Página de avisos</p>					
					</div>				
							
			</a>		
		</div>
		
		<div class="col-xs-6 col-sm-3 col-md-2">			
			<a href="financeiro.php" class="btn btn-success" >				
									
					<div class="col-xs-12 text-center">						
						<i class="fas fa-dollar-sign fa-5x"></i>					
					</div>					
					<div class="col-xs-12 text-center">						
						<p>Área financeira</p>					
					</div>				
						
			</a>		
		</div>
		</div>	
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
