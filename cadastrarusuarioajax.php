<?php
	if(!isset($_SESSION)){
 	session_start();
 	}  
        	
	
    require_once("banco2.php");
	require_once("banco1.php");


	if(isset($_SESSION ['idUsuario']) && !empty($_SESSION ['idUsuario']) ){
        $idUsuario=$_SESSION ['idUsuario'];
    }else{

        header("Location: login.php");
    }

			$json=array();			
			if(isset($_POST['nomeUsuario']) && !empty($_POST['nomeUsuario']) &&
			 isset($_POST['senha1']) && !empty($_POST['senha1'])  &&
			  isset($_POST['senha2']) && !empty($_POST['senha2'])){
				$usuario=$_POST['nomeUsuario'];
				$senha1 = $_POST['senha1'];
				$senha2 = $_POST['senha2'];		
				try{
					
					$sql=$db->query("SELECT * FROM usuarios WHERE usuario ='$usuario'");

											
					 if($sql->rowCount()>0){ 
				 		
				 		$json[]=array(
                			'status'=> 'erro',
                			'mensagem'=> 'já existe usuário com esse nome',
                			'alert'=> 'alert-danger'
                			 
            			);

            			$jsonString =json_encode($json);
       					echo $jsonString;

				 		//echo("já existe outro processo com esse nome ["."$nome"."] por favor escolha outro nome");
					// 	//ajax com modal mensagem de erro

					}else{

						if($senha1 != $senha2){
							
							$json[]=array(
                			'status'=> 'erro',
                			'mensagem'=> 'As senhas estão diferentes',
                			'alert'=> 'alert-danger'
                			 
            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;

						}else{

							$senha1= md5($senha1);
							

							$query="INSERT INTO `usuarios` ( `id_usuario`,`usuario`, `senha`) VALUES (null, :usuario, :senha)";

							$stmt = $db->prepare($query);

							$stmt->bindValue(':usuario',$usuario);
							$stmt->bindValue(':senha',$senha1);


						   if($stmt->execute()){
						  	
						   	$json[]=array(
                 				'status'=> 'sucesso',
                 				'mensagem'=> 'Usuário cadastrado com sucesso',
                 				'alert'=> 'alert-success' 

             				);

             				$jsonString =json_encode($json);
        					echo $jsonString;

						   }else{
						  	 
						  	$json[]=array(
                 				'status'=> 'erro',
                 				'mensagem'=> 'conexão perdida com o banco de dados',
                 				'alert'=> 'alert-danger' 

             				);

             				$jsonString =json_encode($json);
        					echo $jsonString;
						   }

						}		
				
					}
						
			
				

			}catch (PDOException $e){
				echo "Falhou: ".$e->getMessage();
			}

			}

	
?>