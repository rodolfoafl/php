<?php
require_once 'config.php';
require_once DBAPI;
$db = open_database();
?>

<?php
   
  // Verifica se houve POST e se o usu�rio ou a senha �(s�o) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      header("Location: login.php"); 
      exit;
  }
   
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  // Valida��o do usu�rio/senha digitados
  $sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '".$usuario ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1";
  $query = $db->query($sql) or die("Erro no banco de dados!");
  if ($query->num_rows != 1) {
      // Quando os dados s�o inv�lidos e/ou o usu�rio n�o foi encontrado
      header("Location: login.php"); exit;
  } else {
      // Salva os dados encontados na vari�vel $resultado
      $resultado = $query->fetch_assoc();

      // Se a sess�o n�o existir, inicia uma
      if (!isset($_SESSION)) session_start();
   
      // Salva os dados encontrados na sess�o
      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado['nome'];
      $_SESSION['UsuarioNivel'] = $resultado['nivel'];
   

      //teste
      //echo $_SESSION['UsuarioID'],  $_SESSION['UsuarioNome'],  $_SESSION['UsuarioNivel'] ;

      //Redireciona o visitante
      header("Location: sistema.php"); exit;
  }

?>