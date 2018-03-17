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

  <div class="collapse navbar-collapse justify-content-end">
      
      <a class="btn btn-info my-2 my-sm-0" href="<?php echo BASEURL;?>login.php">Entrar</a>
  </div>
</nav>


    <main class="container">
      <header>
<?php 
  if($gerar) {
echo '
  <div class="row hbar">
    <div class="col-sm ">
      <h2>' .$titulo .'</h2>
    </div>
    ';
}
if(isset($_GET['cadastrar'])) {
   $cadastrar = BASEURL . 'classes/' .$_GET['cadastrar'] .'.php';
    $atualizar = BASEURL . 'classes/' .$_GET['atualizar'] .'.php';
    $modo = BASEURL . 'classes/' .$_GET['modo'] .'.php';

echo '

    <div class="col-sm-6 text-right h2">
        <a class="btn btn-info my-2 my-sm-0" href="' .$cadastrar .'"><i class="fa fa-plus"></i> Novo Condomínio</a>
        <a class="btn btn-info my-2 my-sm-0" href="' .$atualizar .'" ><i class="fa fa-refresh"></i> Atualizar</a>
        <a class="btn btn-info my-2 my-sm-0" href="' .$modo .'" ><i class="fa fa-eye"></i> Cards</a>
      </div>
  </div>
   ';
}
 ?>
</header>
</body>
</html>