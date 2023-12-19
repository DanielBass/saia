<?php
	if(!isset($_SESSION)){
      session_start();
    }
    
echo "<script>alert('testado');</script>";
    require_once("banco2.php");
    require_once("banco1.php");
    require_once("funcao.php");
    
    if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario=$_SESSION ['idUsuario'];

         $idAtividade= $_GET['id'];

         $sql="DELETE FROM itens WHERE id_atividade ='$idAtividade'";
         
         $sql2=$db->query("SELECT id_processo FROM atividades WHERE id_atividade ='$idAtividade'");
         
         if($sql2->rowCount()>0){
         	$x=$sql2->fetch();
         	$_SESSION['nomeProcessoT']=$x['id_processo'];
         }
         $db->query($sql);
         $sql="DELETE FROM atividades WHERE id_atividade = '$idAtividade'";
         
         if($db->query($sql)){

         	alerta("documento excluido com sucessso");
         	header("Location: tabela.php");

         }else{

         	alerta ("erro na exclusão");
         	header("Location: tabela.php");
         }

    }else{

        header("Location: login.php");
    }
    



	//alert("documento excluido com sucessso");


?>