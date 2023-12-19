<?php

	if(!isset($_SESSION)){
      session_start();
    }
    
     require_once("banco2.php");
    require_once("banco1.php");
    
    
    if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario=$_SESSION ['idUsuario'];
        $idProcesso=$_GET['id'];

        $sql=$db->query("SELECT id_atividade FROM atividades WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");

        if($sql->rowCount()>0){
        	
        	foreach ($sql->fetchAll() as $item){

        		$idAtividade =$item['id_atividade'];
        		$sql2=$db->query("DELETE FROM itens WHERE id_atividade = '$idAtividade'");

        		
        	}

        }

        $sql=$db->query("DELETE  FROM atividades WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");
        $sql=$db->query("DELETE  FROM Etapas WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");
        $sql=$db->query("DELETE  FROM processos WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");
        header("Location: mostrarprocesso.php");
    }else{

        header("Location: login.php");
    }
?>