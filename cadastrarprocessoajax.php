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
			if(isset($_POST['nome']) && empty($_POST['nome']==false)){
				$nome=$_POST['nome'];
				$obs = $_POST['observacao'];		
				try{
					
					$sql=$db->query("SELECT * FROM processos WHERE nomeProcesso ='$nome' AND id_usuario = '$idUsuario'");

											
					 if($sql->rowCount()>0){ 
				 		
				 		$json[]=array(
                			'status'=> 'erro',
                			'mensagem'=> 'já existe processo com esse nome',
                			'alert'=> 'alert-danger'
                			 
            			);

            			$jsonString =json_encode($json);
       					echo $jsonString;

				 		//echo("já existe outro processo com esse nome ["."$nome"."] por favor escolha outro nome");
					// 	//ajax com modal mensagem de erro

					}else{

								
				
					 	$query="INSERT INTO `processos` (`id_processo`, `id_usuario`, `nomeProcesso`, `observacao`) VALUES (NULL, :usuario, :nome, :obs)";
					 
					 
					 
					  	$stmt = $db->prepare($query);
					 	
						 $stmt->bindValue(':usuario', $idUsuario);
						  $stmt->bindValue(':nome',$nome);
						  $stmt->bindValue(':obs', $obs);
						
						  if($stmt->execute()){
						  	
						  	$json[]=array(
                				'status'=> 'sucesso',
                				'mensagem'=> 'processo cadastrado com sucesso',
                				'alert'=> 'alert-success' 

            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;

						  }else{
						 	$json[]=array(
                				'status'=> 'erro',
                				'mensagem'=> 'conexção perdida com o banco de dados',
                				'alert'=> 'alert-danger' 

            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;
						  }
					 			
					 	
					}
						
			
				

			}catch (PDOException $e){
				echo "Falhou: ".$e->getMessage();
			}

			}

	
?>