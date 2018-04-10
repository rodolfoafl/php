<?php
require_once('functions.php');
if ($log = listar('log')) : $log = array_reverse($log);?>
<div class="log">
<?php foreach ($log as $msg) : $obj = buscar($msg['tabela'], $msg['objeto'])?>
		<div class="alert alert-<?php echo $msg['tipo']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php 
		if (isset($obj)) {
		    if (isset($obj['nome'])) {
		        $item = $obj['nome'];
		    } else if (isset($obj['numero'])) {
		        $item = 'Apartamento: ' .$obj['numero'];
		    } else if (isset($obj['titulo'])) {
		        $item = $obj['titulo'];
		    } else {
		        $item = 'Serviço';
		    }
		    
		} else {
		    $item = '';
		}
		echo $item .$msg['mensagem']; 
		
		?>
	</div>
<?php endforeach; ?>
</div>
<?php else : ?>	
<tr>
		<td colspan="6">Nenhum registro de alterações encontrado.</td>
	</tr>
<?php endif; ?>