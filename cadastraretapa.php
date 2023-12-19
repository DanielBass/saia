<?php

	if(!isset($_SESSION)){
 	session_start();
 	}  
        	
	if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario=$_SESSION ['idUsuario'];
        
        
    }else{

        header("Location: login.php");
    }
    require_once("banco2.php");
	require_once("banco1.php");


	

				
			if(isset($_POST['nomeProcessoE']) && !empty($_POST['nomeProcessoE']) && isset($_POST['nomeEtapa']) && !empty($_POST['nomeEtapa'])){
				$idProcesso=$_POST['nomeProcessoE'];
				$nomeEtapa=$_POST['nomeEtapa'];
				$truee=1;
				$obs = $_POST['observacao'];
					
				try{
					
					$sql=$db->query("SELECT * FROM etapas WHERE nomeEtapa ='$nomeEtapa' AND id_usuario = '$idUsuario' AND id_processo ='$idProcesso'");

						
					 if($sql->rowCount()>0){ 
				 		$json[]=array(
                			'status'=> 'erro',
                			'mensagem'=> 'Já existe um etapa com esse nome',
                			'alert'=> 'alert-danger' 
                			
            			);

            			$jsonString =json_encode($json);
       					echo $jsonString;

					}else{
						 
						 $sql=("UPDATE `processos` SET `chavePE` = '1' WHERE `processos`.`id_processo` = '$idProcesso'");
						 $db->query($sql);

					 	$query="INSERT INTO `etapas` (`id_etapa`, `nomeEtapa`, `observacao`, `id_usuario`, `id_processo`) VALUES (NULL, :etapa, :obs, :usuario,:processo)";
					 
					 
					 	$stmt = $db->prepare($query);
					 	
						$stmt->bindValue(':etapa', $nomeEtapa);
						$stmt->bindValue(':obs',$obs);
						$stmt->bindValue(':usuario', $idUsuario);
						$stmt->bindValue(':processo', $idProcesso);
						 if($stmt->execute()){
						 	
						 	$json[]=array(
                			'status'=> 'sucesso',
                			'mensagem'=> 'etapa cadastrada com sucesso',
                			'alert'=> 'alert-success' 
                			
            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;
						 }else{
							$json[]=array(
                			'status'=> 'erro',
                			'mensagem'=> 'não conseguimos estabecer conexão com o banco de dados',
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