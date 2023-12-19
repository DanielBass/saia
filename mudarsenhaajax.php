<?php
	if(!isset($_SESSION)){
 	session_start();
 	}  
        	
	
    require_once("banco2.php");
	require_once("banco1.php");


	if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario=$_SESSION ['idUsuario'];
    }else{

        header("Location: login.php");
    }

			$json=array();			
			if(isset($_POST['senhaantiga']) && !empty($_POST['senhaantiga']) &&
			 isset($_POST['senhanova1']) && !empty($_POST['senhanova1'])  &&
			  isset($_POST['senhanova2']) && !empty($_POST['senhanova2'])){
				$senha0=$_POST['senhaantiga'];
				$senha1 = $_POST['senhanova1'];
				$senha2 = $_POST['senhanova2'];		
				try{
					
					$sql=$db->query("SELECT * FROM usuarios WHERE id_usuario ='$idUsuario'");

											
					 if($sql->rowCount()>0){ 
				 		
				 		$item= $sql->fetch();

				 		if (md5($senha0) != $item['senha']){

				 			$json[]=array(
                			'status'=> 'erro',
                			'mensagem'=> 'As senhas digita não corresponde com a senha atual do usuário',
                			'alert'=> 'alert-danger'
                			 
            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;

				 		}

				 		if($senha1 != $senha2){

				 			$json[]=array(
                			'status'=> 'erro',
                			'mensagem'=> 'As senhas estão diferentes',
                			'alert'=> 'alert-danger'
                			 
            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;
				 		}
				 		
				 		if($senha0 == $senha1 && $senha0 == $senha2){

				 			$json[]=array(
                			'status'=> 'erro',
                			'mensagem'=> 'As senhas não pode ser igual a antiga',
                			'alert'=> 'alert-danger'
                			 
            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;	
				 		}

				 		//echo("já existe outro processo com esse nome ["."$nome"."] por favor escolha outro nome");
					// 	//ajax com modal mensagem de erro

					}
						
				if( (md5($senha0) == $item['senha']) && ($senha1 == $senha2) )  {

					$senha1=md5($senha1);

					$db->query("UPDATE usuarios SET senha = '$senha1' WHERE id_usuario = '$idUsuario'");

					$json[]=array(
                			'status'=> 'erro',
                			'mensagem'=> 'senha alterada com sucesso',
                			'alert'=> 'alert-success'
                			 
            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;
				}
				

			}catch (PDOException $e){
				echo "Falhou: ".$e->getMessage();
			}

			}

	
?>