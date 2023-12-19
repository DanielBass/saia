<?php
   // echo "opa";
    if(!isset($_SESSION)){
      session_start();
    }
    
     require_once("banco2.php");
    require_once("banco1.php");
    
    
    if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario=$_SESSION ['idUsuario']; 
        $idAtividade = $_SESSION['idAtividade'] ;
        $item = $_POST['itemAjax'];
        //echo $idAtividade;
        //echo $item;
        switch ($item) {
            case 1:
                $itemString = "Particulas sólidas" ;
            break;
            
            case 2:
                $itemString = "Gases e vapores" ;
            break;
            case 3:
                $itemString = "Contaminação da água" ;
            break;
            case 4:
                $itemString = "Contaminação do solo" ;
            break;
            case 5:
                $itemString = "Redução da diversidade" ;
            break;
            case 6:
                $itemString = "Economia Local" ;
            break;
            case 7:
                $itemString = "Infraestrutura" ;
            break;
            case 8:
                $itemString = "Tecnologia" ;
            break;
            case 9:
                $itemString = "Qualidade de vida" ;
            break;
            case 10:
                $itemString = "Saúde" ;
            break;
            case 11:
                $itemString = "Desenvolvimento Regional" ;
            break;
            case 12:
                $itemString = "Paisagimos" ;
            break;
            case 13:
                $itemString = "Qualidade do Produto Final" ;
            break;
        }

          if(isset($_POST['itemAjax']) && !empty($_POST['itemAjax']) ){
            

          	$query=("SELECT  * 
                FROM  `itens` WHERE 
                `id_atividade` ='$idAtividade' 
                AND `item` = '$itemString'");

          	$resultado = mysqli_query($conn,$query);
            $json=array();
            $jsonString=array();


            while ($row = mysqli_fetch_array($resultado)){
                $json[]=array(
                    

                    'iniciais'=> $row['iniciais'],
                    'imagem' => $row ['imagem'],
                    'obs' => $row ['obs']
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


