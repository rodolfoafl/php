<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <?php 
  if(isset($_GET['titulo'])) { 
    $gerar = 1;
    $titulo = $_GET['titulo'];
  } else {
    $gerar = 0;
    $titulo = 'Sistema ADMC';
  };
  if(!isset($_SESSION)) {
      session_start();
  }
  $dir = getcwd();
  if(strpos( $dir , 'administrativo') > 0) {
    $index = 'administrativo';
    $nivel_pagina = 0;
  } else if(strpos( $dir , 'sindico') > 0) {
    $index = 'sindico';
    $nivel_pagina = 1;
  } else if(strpos( $dir , 'morador') > 0) {
    $index = 'morador';
    $nivel_pagina = 2;
  }
  else if(!isset($_SESSION['nivel'])){
    $nivel_pagina = -1;
    $index = 'index.php';
  }
  if($nivel_pagina != -1){
         
    if(!isset($_SESSION['nivel']) || ($_SESSION['nivel']) != $nivel_pagina){
      session_destroy();
      header('Location:' .BASEURL);
    }
  }
 
  
    ?>
	<?php echo '<title> '.strip_tags($titulo) .'</title>'?>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php echo BASEURL;?>css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASEURL;?>css/style.css">
	<style>

	</style>

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
	

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo BASEURL .$index;?>">Sistema ADMC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end">
      <?php 
        if(isset($_SESSION['login'])) {
          echo '<div class="nome"> Usuario: ' .$_SESSION['login'] .'(' .$index .')' .'</div>';
        } else {
          echo '<a class="btn btn-info my-2 my-sm-0" href="index.php">Entrar</a>';
        }
      ?>
      
</div>
</nav>


    <main class="container">
      <header>

</header>

</body>
</html>