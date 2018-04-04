<?php
require_once('../functions.php');

session_start();
$_SESSION['nivel_pagina'] = 0;

if (isset($_GET['id'])){
    deletarGenerico($_GET['id'], 'moradores');
}else{
    die("ERRO: ID não definido.");
}
?>