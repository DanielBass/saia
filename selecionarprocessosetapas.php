<?php


    if(!isset($_SESSION)){
      session_start();
    }

     if(isset($_SESSION ['idUsuario']) && !empty($_SESSION ['idUsuario']) ){
         $idUsuario=$_SESSION ['idUsuario'];
         
         
     }else{

            header("Location: login.php");
        }   
    
    
     require_once("banco2.php");
    require_once("banco1.php");
    
    function carregarProcessos(){
        
        include'banco2.php';
          $x =$GLOBALS['idUsuario'];
        $query = "SELECT id_processo,  id_usuario, nomeProcesso 
        FROM `processos` 
        WHERE id_usuario = $x
        AND chavePE = 1";
        
        $resultado=mysqli_query($conn,$query);

        $json =array();

        while ($row = mysqli_fetch_array($resultado)) {
            
            $json[]=array(
                'idprocesso'=> $row['id_processo'],
                'idusuario'=> $row['id_usuario'],
                'nomeprocesso'=>$row['nomeProcesso'] 
            );
        }

        $jsonString =json_encode($json);
        echo $jsonString;
    }
    //echo ("oi");
 function   carregarEtapa($idprocesso){
        
           include'banco2.php';
           $x =$GLOBALS['idUsuario'];

           $query = "SELECT id_etapa,  id_usuario, id_processo, nomeEtapa 
           FROM `etapas` 
           WHERE id_usuario = $x 
           AND id_processo = $idprocesso";

           $resultado =mysqli_query($conn,$query);
           


                $jsonstring=array();

                while($row = mysqli_fetch_array($resultado)){

                    $json[]=array(
                        'idetapa'=>$row['id_etapa'],
                        'idusuario'=>$row['id_usuario'],
                        'idprocesso'=>$row['id_processo'],
                        'nomeetapa'=>$row['nomeEtapa']
                    );
                }
                $jsonString =json_encode($json);
                echo $jsonString;      
           

          

    }


   if(isset($_POST['idprocesso'])){
        $idprocesso=$_POST['idprocesso'];
        carregarEtapa($idprocesso);
          //echo ("Deus sou eu aqui de novo");
       }else{
           carregarProcessos();
          // echo ("Deus sou eu aqui de novo");    
       }
    
   // carregarProcessos();
?>
