<?php 

	if(!isset($_SESSION)){
 	session_start();
 	}  
        	
	if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario= $_SESSION ['idUsuario'];
        
        
    }else{

        header("Location: login.php");
    }
    require_once("banco2.php");
	require_once("banco1.php");


	
			
				
			if(isset($_POST['nomeEtapaEd']) && !empty($_POST['nomeEtapaEd'])){
				$idEtapa=$_SESSION['idEtapa'];
				$nomeEtapa=$_POST['nomeEtapaEd'];
				$observacao=$_POST['observacaoEd'];
				
					
				try{
						
							 
					$db->query("UPDATE etapas SET nomeEtapa = '$nomeEtapa', observacao = '$observacao' WHERE id_etapa = '$idEtapa' AND id_usuario = '$idUsuario'");

							$json[]=array(
                			'status'=> 'sucesso',
                			'mensagem'=> 'Etapa alterada com sucesso',
                			'alert'=> 'alert-success'
                			 
            				);

            			$jsonString =json_encode($json);
       					echo $jsonString;
					
						
					 
					 	
					
						
				

				}catch (PDOException $e){
					echo "Falhou: ".$e->getMessage();
				}

			}

			

	
?>