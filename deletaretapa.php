<?php

	if(!isset($_SESSION)){
      session_start();
    }
    
     require_once("banco2.php");
    require_once("banco1.php");
    
    
    if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario=$_SESSION ['idUsuario'];
        $idEtapa=$_GET['id'];

        $sql=$db->query ("SELECT id_processo FROM etapas WHERE id_etapa = '$idEtapa' AND id_usuario = '$idUsuario'");
        //echo("SELECT id_processo FROM etapas WHERE id_etapa = '$idEtapa' AND id_usuario = '$idUsuario'");
        
        if($sql->rowCount()>0){
           // echo ("opa");
            $item = $sql->fetch();
            $idProcesso= $item['id_processo'];
        }


        $sql=$db->query("SELECT id_atividade FROM atividades WHERE id_etapa = '$idEtapa' AND id_usuario = '$idUsuario'");

        if($sql->rowCount()>0){
        	
        	foreach ($sql->fetchAll() as $item){

        		$idAtividade =$item['id_atividade'];
        		$sql2=$db->query("DELETE FROM itens WHERE id_atividade = '$idAtividade'");

        		
        	}

        }

        $sql=$db->query("DELETE  FROM atividades WHERE id_etapa = '$idEtapa' AND id_usuario = '$idUsuario'");
        $sql=$db->query("DELETE  FROM etapas WHERE id_etapa = '$idEtapa' AND id_usuario = '$idUsuario'");

        $sql2=$db->query("SELECT * FROM etapas where id_processo = '$idProcesso' AND id_usuario ='$idUsuario'");
        //echo("SELECT * FROM etapas where id_processo = '$idProcesso' AND id_usuario ='$idUsuario'");

        if($sql2->rowCount()>0){
            
        }else{
            $sql=("UPDATE `processos` SET `chavePE` = '0' WHERE `processos`.`id_processo` = '$idProcesso'");
            $db->query($sql);
           }     
        header("Location: mostraretapa.php");
        
        
    }else{

        header("Location: login.php");
    }
?>