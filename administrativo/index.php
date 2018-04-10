<?php
require_once '../config.php';
require_once DBAPI;
$_GET['titulo'] = 'Dashboard';

include(HEADER_TEMPLATE);
$db = open_database();
?>

<?php if($db): ?>
	<div class="row">		
		<div class="col-xs-6 col-sm-3 col-md-2">			
			<a href="condominios/index.php" class="btn btn-info">				
				<div class="row">					
					<div class="col-xs-12 text-center">						
						<i class="fas fa-list fa-5x"></i>					
					</div>					
					<div class="col-xs-12 text-center">						
						<p>Gerenciar condomínios</p>					
					</div>				
				</div>			
			</a>		
		</div>	
		
			<div class="col-xs-6 col-sm-3 col-md-2">			
			<a href="apartamentos/index.php" class="btn btn-info">				
				<div class="row">					
					<div class="col-xs-12 text-center">						
						<i class="fa fa-building fa-5x"></i>					
					</div>					
					<div class="col-xs-12 text-center">						
						<p>Gerenciar apartamentos</p>					
					</div>				
				</div>			
			</a>		
		</div>	
		
			<div class="col-xs-6 col-sm-3 col-md-2">			
			<a href="funcionarios/index.php" class="btn btn-info">				
				<div class="row">					
					<div class="col-xs-12 text-center">						
						<i class="fa fa-handshake fa-5x"></i>					
					</div>					
					<div class="col-xs-12 text-center">						
						<p>Gerenciar funcionários</p>					
					</div>				
				</div>			
			</a>		
		</div>	
		
		<div class="col-xs-6 col-sm-3 col-md-2">			
			<a href="moradores/index.php" class="btn btn-info">				
				<div class="row">					
					<div class="col-xs-12 text-center">						
						<i class="fa fa-users fa-5x"></i>					
					</div>					
					<div class="col-xs-12 text-center">						
						<p>Gerenciar moradores</p>					
					</div>				
				</div>			
			</a>		
		</div>
	
</div>	
<?php else : ?>	
	<div class="alert alert-danger" role="alert">			
		<p>
			<strong>ERRO:</strong> Não foi possível conectar ao banco de dados!
		</p>		
	</div>	
<?php endif; ?>	
Ultimas alterações:

<?php include(LOG);?>


<?php 
include(FOOTER_TEMPLATE); ?>
