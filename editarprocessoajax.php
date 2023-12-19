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


	
			
				
			if(isset($_POST['nomeProcessoEd']) && !empty($_POST['nomeProcessoEd'])){
				$idProcesso=$_SESSION['idProcesso'];
				$nomeProcesso=$_POST['nomeProcessoEd'];
				$observacao=$_POST['observacaoEd'];
				
					
				try{
						
							 
					$db->query("UPDATE processos SET nomeProcesso = '$nomeProcesso', observacao = '$observacao' WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");

							$json[]=array(
                			'status'=> 'sucesso',
                			'mensagem'=> 'Processo alterado com sucesso',
                			'alert'=> 'alert-success'
                			 
            				);

            			$jsonString =json_encode($json);
       					echo $jsonString;
					
						
					 
					 	
					
						
				

				}catch (PDOException $e){
					echo "Falhou: ".$e->getMessage();
				}

			}

			

	
?>