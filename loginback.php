<?php
	
	session_start();
    require_once("banco2.php");
	require_once("banco1.php");
	if(isset($_POST['usuario']) && empty($_POST['usuario'])== false){
		$usuario = addslashes($_POST['usuario']);
		$senha = md5(addslashes($_POST['senha']));
		

		try{
			
			$sql =$db->query ("SELECT * FROM usuarios where usuario = '$usuario' AND senha='$senha' ");
			if($sql->rowCount()> 0){
				$dado = $sql->fetch();
				$_SESSION ['idUsuario'] = $dado ['id_usuario'];
                $_SESSION ['nomeusuario'] = $dado ['usuario'];
                
				header("Location: index.php"); 
			}else{
					echo('<div class="content float-letf">
					<div class="row">
						<div class="col-md-3 ml-auto" >
							<div class="alert alert-danger" role="alert">
  								<h5 class="alert-heading">Erro!</h5>
  								<p>Verifique sua senha</p>
  								<hr>
							</div>
						</div>
					</div>
				</div>');
			}


		}catch (PDOException $e){
			echo "Falhou: ".$e->getMessage();
		}		

	}
?>


