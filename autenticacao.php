<?php
require_once 'config.php';
require_once DBAPI;

session_start();
?>

<?php

  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];
  
  $db = open_database();
  
  $sql = "SELECT * FROM `usuarios` WHERE (`login` = '".$usuario ."') LIMIT 1";
  $result = $db->query($sql);
  
  //SE EXISTE USUARIO COM LOGIN PASSADO
  if ($result->num_rows > 0) {
      $found = $result->fetch_assoc();

      //SE USUARIO ESTIVER ATIVO
      if($found['status']){
          //SE SENHA CORRESPONDE A DO BANCO
          if(password_verify($senha, $found['senha'])){
              $nivel = $found['nivel'];
          }else{
              $_SESSION['msg'] = 'Senha incorreta. Tente novamente.';
              header('Location: index.php');
          }       
      }else{
          $_SESSION['msg'] = 'Usuário desativado. Entre em contato com o Administrador.';
          header('Location: index.php');
      }
  }else{
      $_SESSION['msg'] = 'Usuário não encontrado!';
      header('Location: index.php');
  }
  
  $_SESSION['id_usuario'] = $found['id'];
  
  switch($nivel){
      //ADMINISTRADOR
      case 0:
          $_SESSION['nivel'] = $nivel;
          header('Location: administrativo/index.php');
          break;
      //SINDICO
      case 1:
          $_SESSION['nivel'] = $nivel;
          header('Location: sindico/index.php');
          break;
      //MORADOR    
      case 2:
          $_SESSION['nivel'] = $nivel;
          header('Location: morador/index.php');
          break;
  }
?>