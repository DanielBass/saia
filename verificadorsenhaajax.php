<?php
	
	session_start();
     require_once("banco2.php");
	require_once("banco1.php");
	
	if(isset($_POST['usuario']) && empty($_POST['usuario'])== false){
		if(isset($_POST['usuario']) && empty($_POST['usuario'])== false){
			$usuario = addslashes($_POST['usuario']);
			$senha = addslashes($_POST['senha']);
		
	
			try{
			
				$sql =$db->query ("SELECT * FROM usuarios where usuario = '$usuario' and senha ='$senha'");
				if($sql->rowCount()== 0){
			
					//echo("usuário cadastrado");
					//echo("<script>alert('esta sendo o melhor')</script>");
		
			
					echo("senha errada");
			 	
             	 // <h5 class="mensagem"> <?php echo "Email ou Senha incorreto"; </h5>
          		}

			}catch (PDOException $e){
				echo "Falhou: ".$e->getMessage();
			
			}		

		}
	}
?>


