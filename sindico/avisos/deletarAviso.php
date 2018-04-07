<?php
require_once('../functions.php');

if (isset($_GET['id'])){
    deletarGenerico($_GET['id'], 'funcionarios');
}else{
    die("ERRO: ID não definido.");
}
?>