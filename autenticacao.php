<?php
require_once 'config.php';
require_once DBAPI;
$db = open_database();
?>

<?php
   
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      header("Location: login.php"); 
      exit;
  }
   
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  // Validação do usuário/senha digitados
  $sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '".$usuario ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1";
  $query = $db->query($sql) or die("Erro no banco de dados!");
  if ($query->num_rows != 1) {
      // Quando os dados são inválidos e/ou o usuário não foi encontrado
      header("Location: login.php"); exit;
  } else {
      // Salva os dados encontados na variável $resultado
      $resultado = $query->fetch_assoc();

      // Se a sessão não existir, inicia uma
      if (!isset($_SESSION)) session_start();
   
      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado['nome'];
      $_SESSION['UsuarioNivel'] = $resultado['nivel'];
   

      //teste
      //echo $_SESSION['UsuarioID'],  $_SESSION['UsuarioNome'],  $_SESSION['UsuarioNivel'] ;

      //Redireciona o visitante
      header("Location: sistema.php"); exit;
  }

?>