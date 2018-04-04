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
  
  if($_SESSION['nivel_pagina'] != -1){
         
    if(!isset($_SESSION['nivel']) || ($_SESSION['nivel']) != $_SESSION['nivel_pagina']){
      session_destroy();
      header('Location: ../index.php');
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
  <a class="navbar-brand" href="<?php echo BASEURL;?>index.php">Sistema ADMC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


</nav>


    <main class="container">
      <header>

</header>

</body>
</html>