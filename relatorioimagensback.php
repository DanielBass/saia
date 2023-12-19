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
    
?>



<?php
    
    
    if(!isset($_SESSION)){
      session_start();
    }
    
     require_once("banco2.php");
     require_once("banco1.php");
    
    
    if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        
        $idUsuario=$_SESSION ['idUsuario'];
        $idProcesso =$_POST['nomeProcessoF'];
        $_SESSION['vetordeimagem'] ="";

        $sql=("SELECT * FROM processos WHERE id_processo='$idProcesso'");
        $sql=$db->query($sql);
        if($sql->rowCount() > 0){
            $item = $sql->fetch();
        }
      
        if (isset($item['nomeProcesso'])){
             $nomeProcesso=$item['nomeProcesso'];
             $_SESSION['string01'] ="Nesse relatório veremos as imagens cadastradas no processo ({$nomeProcesso})";
            $_SESSION['vetordeimagem'] .="<div classe='sectiongrid'>";
        }

        $sql2=("SELECT * FROM  etapas WHERE id_processo = '$idProcesso'");
        $sql2=$db->query($sql2);

        if($sql2->rowCount() > 0){
            
            foreach ($sql2->fetchAll() as $item2) {

                $idEtapa =$item2['id_etapa'];
                $sql3=("SELECT * FROM atividades WHERE  id_etapa = '$idEtapa'");
                $sql3=$db->query($sql3);

                if($sql3->rowCount()> 0){

                    foreach($sql3->fetchAll() as $item3){

                        $idAtividade=$item3['id_atividade'];
                        $sql4=("SELECT * FROM itens WHERE id_atividade = '$idAtividade'");
                        $sql4=$db->query($sql4);

                        if($sql4->rowCount()>0){

                            foreach($sql4->fetchAll() as $item4){

                                if ($item4['imagem'] != ""){

                                    $imagem = $item4['imagem'];
                                    
                                      
                                            $_SESSION['vetordeimagem'] .="<div class='divImgPadrao'><img src=upload/".$imagem." heigth='400px' width='400px' class='imagemPadrao'  /><p>imagem do item: <b>".$item4['item']."</b> da atividade:<b> ".$item3['nomeAtividade']."</b> da Etapa:<b> ".$item2['nomeEtapa']."</b></p></div>";
                                       
                                      
                                    
                                }
                            }
                        }
                        

                    }
                $_SESSION['vetordeimagem'] .="</div>";
                }
            }
        }    

    }else{

        header("Location: login.php");
    }
    
?>