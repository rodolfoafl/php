<?php 
  require_once('functions.php'); 

  	if (isset($_GET['id'])){
    	deletar($_GET['id']);
  	}else{
    	die("ERRO: ID não definido.");
  	}
?>