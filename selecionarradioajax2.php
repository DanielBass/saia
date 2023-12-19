<?php
   // echo "opa";
    if(!isset($_SESSION)){
      session_start();
    }
    
     require_once("banco2.php");
    require_once("banco1.php");
    
    
    if(isset($_SESSION ['idUsuario']) && !empty($_SESSION ['idUsuario']) ){
        $idUsuario=$_SESSION ['idUsuario'];
        $idProcesso=$_SESSION['buscaProcesso'];
        $idEtapa=$_SESSION['buscaEtapa'];
         $item = $_POST['item'];

        $sql2=$db->query("SELECT * FROM atividades  WHERE id_usuario = '$idUsuario' AND id_processo ='$idProcesso' AND id_etapa ='$idEtapa' ORDER BY id_atividade DESC LIMIT 1");
        
        if($sql2->rowCount()>0){
          
            foreach ($sql2->fetchAll() as $item2){

                $_SESSION['idAtividade'] =$item2['id_atividade'];
                $idAtividade=$item2['id_atividade'];
            }
        }

       
        

          if(isset($_POST['item']) && !empty($_POST['item']) ){
             

          	$query=("SELECT  * 
                FROM  `itens` WHERE 
                `id_atividade` ='$idAtividade' 
                AND `item` = '$item'");

          	$resultado = mysqli_query($conn,$query);
            $json=array();
            $jsonString=array();


            while ($row = mysqli_fetch_array($resultado)){
                $json[]=array(
                    

                    'iniciais'=> $row['iniciais'],
                    'imagem' => $row ['imagem'],
                    'obs' => $row ['obs'],
                    'item'=> $row ['item']
                );

            } 
            $jsonString =json_encode($json);
            echo $jsonString;    	
        
            //echo $item;
        
      }else{
        //echo $item;
      }
    
 }else{

         header("Location: login.php");
     }
?>


