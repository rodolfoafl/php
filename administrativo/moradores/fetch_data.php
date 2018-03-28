<?php
require_once('../../administrativo/functions.php');

    if(isset($_POST['id_condominio'])){
        $id_condominio = $_POST['id_condominio'];
        echo $select = dropDownApt('apartamentos', $id_condominio, 'morador');
    }
?>