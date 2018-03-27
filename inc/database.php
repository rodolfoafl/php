<?php
	mysqli_report(MYSQLI_REPORT_STRICT);

	function open_database(){
		try{
			$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			return $conn;
		}catch(Exception $e){
			echo $e->getMessage();
			return null;
		}
	}

	function close_database($conn){
		try{
			mysqli_close($conn);
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	function find($table = null, $id = null) {	  		
		$database = open_database();		
		$found = null;			
		try {		  
			if ($id) {		    
				$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;		    
				$result = $database->query($sql);		    		    
				if ($result->num_rows > 0) {		      
					$found = $result->fetch_assoc();		    
				}		    		  
			} else {		    		    
				$sql = "SELECT * FROM " . $table;		    
				$result = $database->query($sql);		    		    
				if ($result->num_rows > 0) {		      
					$found = $result->fetch_all(MYSQLI_ASSOC);	        	        		   
				 }		  
			}		
		} catch (Exception $e) {		  
			$_SESSION['message'] = $e->GetMessage();		  
			$_SESSION['type'] = 'danger';	  
		}				
		close_database($database);		
		return $found;	
	}

	function find_all($table){	  
		return find($table);	
	}

	function salvar($table = null, $data){
		$db = open_database();

		$col = null;
		$val = null;

		foreach($data as $key => $value){
			$col .= trim($key, "'") . ",";
			$v = preg_replace('/\s+/', ' ', trim($value));
			$val .= "'$v',";
		}

		$col = rtrim($col, ',');
		$val = rtrim($val, ',');

		$sql = "INSERT INTO $table ($col) VALUES ($val);";

		try{
			$db->query($sql);
			$_SESSION['message'] = 'Cadastro realizado com sucesso.';
			$_SESSION['type'] = 'success';
		}catch(Exception $e){
			$_SESSION['message'] = 'Não foi possível realizar o cadastro.';
			$_SESSION['type'] = 'danger';
		}
		close_database($db);
	}

	function update($table = null, $id = 0, $data = null){
		$db = open_database();

		$itens = null;

		foreach($data as $key => $value){
		    $v = preg_replace('/\s+/', ' ', trim($value));
			$itens .= trim($key, "'") . "='$v',";
		}
		$itens = rtrim($itens, ',');

		$sql = "UPDATE $table SET $itens WHERE id= $id;";

		try {	    
			$db->query($sql);		    
			$_SESSION['message'] = 'Item atualizado com sucesso.';	    
			$_SESSION['type'] = 'success';		  
		} catch (Exception $e) { 		    
			$_SESSION['message'] = 'Nao foi possivel atualizar o item.';	    
			$_SESSION['type'] = 'danger';	  
		} 
		close_database($db);
	}

	function remover($id = null, $table){
		$db = open_database();

		try{
			if($id){
				$sql = "DELETE FROM $table WHERE id= $id";
				
				if($result = $db->query($sql)){
					$_SESSION['message'] = "Item removido com sucesso.";
					$_SESSION['type'] = "success";
				}
			}

		}catch(Exception $e){
			$_SESSION['message'] = "Não foi possívl remover o item.";
			$_SESSION['type'] = "danger";
		}

		close_database($db);
	}

	function constroiDropDown($tabela, $classe, $id_selecionado = null){
	    $db = open_database();
	    
	    $sql = null;
	    
	    $atributo = null;
	    
	    if($tabela == "condominios"){
	        $atributo = "'id_condominio'";
	        $sql = "SELECT id, nome FROM $tabela";
	        $campo = "nome";
	    }
	    if($tabela == "apartamentos"){
	        $atributo = "'id_apartamento'";
	        $sql = "SELECT id, numero FROM $tabela";
	        $campo = "numero";
	    }
	    
	    $result = $db->query($sql);	
	    
	    if($result->num_rows > 0){
	        if($classe == 'morador'){
	           $select = '<select name="cdm" class="form-control" onChange="fetch_select(this.value);">';
	        }else{
	           $select = '<select name="'.$classe.'['.$atributo.']" class="form-control" onChange="fetch_select(this.value);">';
	        }
	        $select.= '<option value="" selected disabled hidden>Selecione uma opção</option>';
	        while($rs=$result->fetch_assoc()){
	            if(($id_selecionado) && ($rs['id'] == $id_selecionado)){
	                $select.='<option value="'.$rs['id'].'" selected="selected">'.$rs[$campo].'</option>';   
	            }else{
	               $select.='<option value="'.$rs['id'].'">'.$rs[$campo].'</option>';
	            }
	        }
	    }
	    $select.='</select>';
	    return $select;    
	}
	
	function constroiDropDownApt($tabela, $id_condominio, $classe, $id_tabela = null){
	    $db = open_database();
	    

	
        $atributo = "'id_apartamento'";
        $sql = "SELECT id, numero FROM $tabela where id_condominio = $id_condominio";
	    $campo = "numero";
	
	    
	    $result = $db->query($sql);
	    
	    if($result->num_rows > 0){
	        $select = '<select name="'.$classe.'['.$atributo.']" class="form-control">';
	        $select.= '<option value="" selected disabled hidden>Selecione uma opção</option>';
	        
	        while($rs=$result->fetch_assoc()){
	            if(($id_tabela) && ($rs['id'] == $id_tabela)){
	                $select.='<option value="'.$rs['id'].'" selected="selected">'.$rs[$campo].'</option>';
	            }else{
	                $select.='<option value="'.$rs['id'].'">'.$rs[$campo].'</option>';
	            }
	        }
	    }else{
	        $select = '<select name="'.$classe.'['.$atributo.']" class="form-control">';
	        $select.= '<option value="" selected disabled hidden>Nenhum apartamento cadastrado!</option>';
	    }
	    $select.='</select>';
	    return $select;
	}
	

?>