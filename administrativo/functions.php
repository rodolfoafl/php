<?php
	require_once('../../config.php');
	require_once(DBAPI);

	//$condominios = null;
	//$condominio = null;

	/*function listarTodos(){
		global $condominios;
		$condominios = find_all('condominios');
	}*/

	//GENÉRICO PARA QUALQUER TABELA
	function listar($tabela){
		return find_all($tabela);
	}
	

	/*function adicionar(){
		if(!empty($_POST['condominio'])){
			$condominio = $_POST['condominio'];
			salvar('condominios', $condominio);
			header('location: index.php?id=4343');
		}
	}*/

	
	function adicionarGenerico($classe, $tabela){
		if(!empty($_POST[$classe])){
			$obj = $_POST[$classe];
			
			if($tabela == 'usuarios'){
			    $id = salvar($tabela, $obj);
			    return $id;
			}else{
			    salvar($tabela, $obj);
			}
			header('location:'.BASEURL.$_SESSION['index']);
		}
	}
	

	/*function editar(){
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
	}*/

	
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
			header('location:'.BASEURL.$_SESSION['index']);
		}
	}

	/*function detalhes($id = null){
		global $condominio;
		$condominio = find('condominios', $id);
	}*/

	
	function detalhesGenerico($id = null, $tabela){
		$obj = find($tabela, $id);
		return $obj;
	}
	

	/*function deletar($id = null){
		global $condominio;
		$condominio = remover('condominios', $id);

		header('location: index.php');
	}*/

	
	 function deletarGenerico($id = null, $tabela){
		global $obj;
		$obj = remover($id, $tabela);

		header('location: index.php');
	}

	function dropDown($tabela, $classe, $id_selecionado = null){
	    if($id_selecionado){
	        $lista = constroiDropDown($tabela, $classe, $id_selecionado);
	    }else{
	        $lista = constroiDropDown($tabela, $classe);
	    }
	    return $lista;
	}
	
	function dropDownApt($tabela, $id_condominio ,$classe, $id_selecionado = null){
	    if($id_selecionado){
	        $lista = constroiDropDownApt($tabela, $id_condominio, $classe, $id_selecionado);
	    }else{
	        $lista = constroiDropDownApt($tabela, $id_condominio, $classe);
	    }
	    return $lista;
	}

	function gerar($nome) {
	    
	    while($resultado = find_nome($nome) == null) {
	        $nome = $nome . rand(1,9999);
	    }
	     return $resultado = $nome;
	}
	
	function validaCPF($cpf) {
	    
	    // Extrai somente os números
	    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
	    
	    // Verifica se foi informado todos os digitos corretamente
	    if (strlen($cpf) != 11) {
	        return false;
	    }
	    
	    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
	    if (preg_match('/(\d)\1{10}/', $cpf)) {
	        return false;
	    }
	    
	    // Faz o calculo para validar o CPF
	    for ($t = 9; $t < 11; $t++) {
	        for ($d = 0, $c = 0; $c < $t; $c++) {
	            $d += $cpf{$c} * (($t + 1) - $c);
	        }
	        $d = ((10 * $d) % 11) % 10;
	        if ($cpf{$c} != $d) {
	            return false;
	        }
	    }
	    return true;
	}
	
?>