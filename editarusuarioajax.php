<?php 

	if(!isset($_SESSION)){
 	session_start();
 	}  
        	
	if(isset($_SESSION ['idUsuario']) && !empty($_SESSION ['idUsuario']) ){
        
        $idUsuario= $_SESSION ['idUsuario'];
        
    }else{

        header("Location: login.php");
    }

    require_once("banco2.php");
	require_once("banco1.php");


	
			
				
			if(isset($_POST['nomeUsuarioEd']) && !empty($_POST['nomeUsuarioEd'])){
				$idUsuarioEd = $_SESSION['idUusarioSelecionado'];
				$nomeUsuario = $_POST['nomeUsuarioEd'];
				$senha1 = md5($_POST['senha1Ed']);
				$senha2 = md5($_POST['senha2Ed']);
				
                			
				
					
				try{

						if(empty($_POST['senha1Ed']) && empty($_POST['senha2Ed'])){
							$db->query("UPDATE usuarios SET usuario ='$nomeUsuario' WHERE id_usuario ='$idUsuarioEd'");

							$json[]=array(
                			'status'=> 'sucesso',
                			'mensagem'=> 'nome do Usuário alterado com sucesso',
                			'alert'=> 'alert-success'
                			 
            				);

            			$jsonString =json_encode($json);
       					echo $jsonString;

						}else if ($senha1 == $senha2){

							

							$db->query("UPDATE usuarios SET usuario ='$nomeUsuario', senha = '$senha1' WHERE id_usuario ='$idUsuarioEd'");
							$json[]=array(
                			'status'=> 'sucesso',
                			'mensagem'=> 'nome do Usuário e senha alterados com sucesso',
                			'alert'=> 'alert-success'
                			 
            				);

							
							$jsonString =json_encode($json);
       						echo $jsonString;

						}

						if($senha1 != $senha2){

							$json[]=array(
                			'status'=> 'erro',
                			'mensagem'=> 'Senha icompatíveis',
                			'alert'=> 'alert-danger'
                			 
            				);


            				$jsonString =json_encode($json);
       						echo $jsonString;	
						}
						

				}catch (PDOException $e){
					echo "Falhou: ".$e->getMessage();
				}

			}

			

	
?>