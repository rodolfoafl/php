<?php
require_once('../functions.php');

if (isset($_GET['id'])){
    deletarGenerico($_GET['id'], 'moradores');
}else{
    die("ERRO: ID não definido.");
}
?>