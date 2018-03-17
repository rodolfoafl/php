<?php
	require_once('../config.php');
	require_once(DBAPI);

	$condominios = null;
	$condominio = null;

	function index(){
		global $condominios;
		$condominios = find_all('condominios');
	}

	/*GENÉRICO PARA QUALQUER TABELA
	function listarGenerico($tabela){
		return find_all($tabela);
	}
	*/

	function adicionar(){
		if(!empty($_POST['condominio'])){
			$condominio = $_POST['condominio'];
			salvar('condominios', $condominio);
			header('location: index.php?id=4343');
		}
	}

	/*
	function adicionarGenerico($classe, $tabela){
		if(!empty($_POST[$classe])){
			$obj = $_POST[$classe];
			salvar($tabela, $obj);
			header('location: index.php');
		}
	}
	*/

	function editar(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];

			if(isset($_POST['condominio'])){
				$condominio = $_POST['condominio'];

				update('condominios', $id, $condominio);
				header('location: index.php');
			}else{
				global $condominio;
				$condominio = find('condominios', $id);
			}
		}else{
			header('location: index.php');
		}
	}

	/*
	function editarGenerico($classe, $tabela){
		if(isset($_GET['id'])){
			$id = $_GET['id'];

			if(isset($_POST[$classe])){
				$obj = $_POST[$classe];

				update($tabela, $id, $obj);
				header('location: index.php');
			}else{
				global $obj;
				$obj = find($tabela, $id);
			}
		}else{
			header('location: index.php');
		}
	}
	*/

	function detalhes($id = null){
		global $condominio;
		$condominio = find('condominios', $id);
	}

	/*
	function detalhesGenerico($id = null, $tabela){
		global $obj;
		$obj = find($tabela, $id);
	}
	*/

	function deletar($id = null){
		global $condominio;
		$condominio = remover('condominios', $id);

		header('location: index.php');
	}

?>