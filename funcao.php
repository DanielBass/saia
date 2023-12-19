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
    


	function alerta ($mensagem){

		echo'<script>alert("'.$mensagem.'");</script>';
		header("Location: tabela.php");
	}

?>