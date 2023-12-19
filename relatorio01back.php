<?php

    
    
    if(!isset($_SESSION)){
      session_start();
    }

    require_once("banco2.php");
    require_once("banco1.php");

    function calculando($info){

        
         
         $x= explode("-",$info);
         $letra =  $x[1];
         if($x[0] == "valor"){

                $posicao = -12;
                $nomeItem ="Valor";

                if($x[1] == 'P'){ 
                    $nomeOpcao= "Positivo";
                }else{
                    $nomeOpcao= "Negativo";
                }
                
             
         } 

         if($x[0] == "dinamica"){

                $posicao = -8;
                $nomeItem ="Dinâmica";

                if($x[1] == 'T'){ 
                    $nomeOpcao= "Temporário cíclico";

                }else if ($x[1] == 'C') {
                    $nomeOpcao= "Cíclico";

                }else{
                    $nomeOpcao= "Permanente";
                }
                
             
         }

         if($x[0] == "significancia"){

                $posicao = -4;
                $nomeItem ="Significância";

                if($x[1] == 'P'){ 
                    $nomeOpcao= "Pequena";

                }else if ($x[1] == 'M') {
                    $nomeOpcao= "Média";

                }else{
                    $nomeOpcao= "Grande";
                }
                
         }

         if($x[0] == "ordem"){

                $posicao = -11;
                $nomeItem ="Ordem";

                if($x[1] == 'D'){ 
                    $nomeOpcao= "Direto";
                }else{
                    $nomeOpcao= "Indireto";
                }
                
             
         }

         if($x[0] == "plastica"){

                $posicao = -7;
                $nomeItem ="Plástica";

                if($x[1] == 'R'){ 
                    $nomeOpcao= "Reservível";
                }else{
                    $nomeOpcao= "Irreversível";
                }
                
             
         }

         if($x[0] == "sensibilidade"){

                $posicao = -3;
                $nomeItem ="Sensibilidade";

                if($x[1] == 'B'){ 
                    $nomeOpcao= "Baixa";

                }else if ($x[1] == 'M') {
                    $nomeOpcao= "Média";

                }else{
                    $nomeOpcao= "Alta";
                }
                
         }

         if($x[0] == "espacial"){

                $posicao = -10;
                $nomeItem ="Espacial";

                if($x[1] == 'L'){ 
                    $nomeOpcao= "Local";

                }else if ($x[1] == 'R') {
                    $nomeOpcao= "Regional";

                }else{
                    $nomeOpcao= "Estratégico";
                }
             
         }

         if($x[0] == "cumulatividade"){

                $posicao = -6;
                $nomeItem ="Cumulatividade";

                if($x[1] == 'P'){ 
                    $nomeOpcao= "Presente";

                }else{
                    $nomeOpcao= "Ausente";

                }

         }

         if($x[0] == "condicoes"){

                $posicao = -2;
                $nomeItem ="Condições";

                if($x[1] == 'N'){ 
                    $nomeOpcao= "Normais";
                }else{
                    $nomeOpcao= "Anormais";
                }
         }

         if($x[0] == "temporal"){

                $posicao = -9;
                $nomeItem ="Temporal";

                if($x[1] == 'C'){ 
                    $nomeOpcao= "Curto prazo";

                }else if ($x[1] == 'M') {
                    $nomeOpcao= "Médio prazo";

                }else{
                    $nomeOpcao= "Longo prazo";
                }
         }

         if($x[0] == "magnitude"){

                $posicao = -5;
                $nomeItem ="Magnitude";

                if($x[1] == 'F'){ 
                    $nomeOpcao= "Fraco";

                }else if ($x[1] == 'M') {
                    $nomeOpcao= "Médio";

                }else{
                    $nomeOpcao= "Forte";
                }
         }

         if($x[0] == "resistencia"){

                $posicao = -1;
                $nomeItem ="Resistência";

                if($x[1] == 'I'){ 
                    $nomeOpcao= "Irredutível";

                }else if ($x[1] == 'M') {
                    $nomeOpcao= "Mitigável";

                }else{
                    $nomeOpcao= "Eliminável";
                }
             
         }
         
         if(isset($letra) && isset($posicao)){
          return array($letra,$posicao,$nomeItem,$nomeOpcao); 
         }
         

    }

    if(isset($_SESSION ['idUsuario']) && !empty($_SESSION ['idUsuario'])){
        
        $idUsuario=$_SESSION ['idUsuario'];
        $idProcesso = $_POST['nomeProcessoR'];
        $_SESSION['string03']= "";

        $sql=$db->query("SELECT nomeProcesso FROM processos WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");
        $dado= $sql->fetch();
        
        
        
      
      if($_POST['numero'] == 1){
      $_SESSION['qualidadeSelect'] = 1;  

        list($letra,$posicao,$nomeItem,$nomeOpcao)=calculando($_POST['Select01']);
        

        $sql=$db->query("SELECT * FROM atividades WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");


        if($sql->rowCount()>0){

            foreach ($sql->fetchAll() as $item1){
                
                $idAtividade =$item1['id_atividade'];
                $idEtapa = $item1['id_etapa'];
                $nomeAtividade = $item1['nomeAtividade'];

                $sql2=$db->query("SELECT * FROM itens WHERE id_atividade = '$idAtividade'");


                foreach($sql2->fetchAll() as $item2){
                    
                    $iniciais = $item2['iniciais'];
                    $itemm = $item2['item'];
                    $iniciais= substr($iniciais, $posicao,1);

                    if ($iniciais == $letra){

                        $sql3=$db->query("SELECT nomeEtapa FROM etapas where id_etapa = '$idEtapa'"); 
                        $item3=$sql3->fetch();
                        $nomeEtapa=$item3['nomeEtapa'];

                        
                        $_SESSION['string03'] .= "item: <b>".$itemm."</b> na atividade: <b>".$nomeAtividade."</b> na  Etapa: <b>".$nomeEtapa."</b></br>";
                        


                    }

                }
            }
        }
      }    

      if($_POST['numero'] == 2){
        $_SESSION['qualidadeSelect'] = 2;
         list($letra1,$posicao1,$nomeItem1,$nomeOpcao1)=calculando($_POST['Select01']);
         list($letra2,$posicao2,$nomeItem2,$nomeOpcao2)=calculando($_POST['Select02']);
        

        $sql=$db->query("SELECT * FROM atividades WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");


        if($sql->rowCount()>0){

            foreach ($sql->fetchAll() as $item1){
                
                $idAtividade =$item1['id_atividade'];
                $idEtapa = $item1['id_etapa'];
                $nomeAtividade = $item1['nomeAtividade'];

                $sql2=$db->query("SELECT * FROM itens WHERE id_atividade = '$idAtividade'");


                foreach($sql2->fetchAll() as $item2){
                    
                    $iniciais1 = $item2['iniciais'];
                    $itemm = $item2['item'];
                    $iniciais1= substr($iniciais1, $posicao1,1);

                    $iniciais2 = $item2['iniciais'];
                    $iniciais2= substr($iniciais2, $posicao2,1);

                    if ($posicao1 != $posicao2){

                        if($iniciais1 == $letra1 && $iniciais2 == $letra2){

                            $sql3=$db->query("SELECT nomeEtapa FROM etapas where id_etapa = '$idEtapa'"); 
                            $item3=$sql3->fetch();
                            $nomeEtapa=$item3['nomeEtapa'];

                            
                            $_SESSION['string03'] .= "item <b>".$itemm."</b> na atividade <b>".$nomeAtividade."</b> na <b>".$nomeEtapa."</b></br>";
                             
                            
                        }

                    }else if ($posicao1 == $posicao2){

                        if($iniciais1 == $letra1 || $iniciais2 == $letra2){

                            $sql3=$db->query("SELECT nomeEtapa FROM etapas where id_etapa = '$idEtapa'"); 
                            $item3=$sql3->fetch();
                            $nomeEtapa=$item3['nomeEtapa'];

                            
                            $_SESSION['string03'] .= "item <b>".$itemm."</b> na atividade <b>".$nomeAtividade."</b> na <b>".$nomeEtapa."</b></br>";
                            
                            
                        }

                    }

                }
            }
        }

      } 

      if($_POST['numero'] == 3){
        $_SESSION['qualidadeSelect'] = 3;
          list($letra1,$posicao1,$nomeItem1,$nomeOpcao1)=calculando($_POST['Select01']);
          list($letra2,$posicao2,$nomeItem2,$nomeOpcao2)=calculando($_POST['Select02']);
          list($letra3,$posicao3,$nomeItem3,$nomeOpcao3)=calculando($_POST['Select03']);
        

        $sql=$db->query("SELECT * FROM atividades WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");


        if($sql->rowCount()>0){

            foreach ($sql->fetchAll() as $item1){
                
                $idAtividade =$item1['id_atividade'];
                $idEtapa = $item1['id_etapa'];
                $nomeAtividade = $item1['nomeAtividade'];

                $sql2=$db->query("SELECT * FROM itens WHERE id_atividade = '$idAtividade'");


                foreach($sql2->fetchAll() as $item2){
                    
                    $iniciais1 = $item2['iniciais'];
                    $itemm = $item2['item'];
                    $iniciais1= substr($iniciais1, $posicao1,1);

                    $iniciais2 = $item2['iniciais'];
                    $iniciais2= substr($iniciais2, $posicao2,1);

                    $iniciais3 = $item2['iniciais'];
                    $iniciais3= substr($iniciais3, $posicao3,1);

                    if ($posicao1 != $posicao2 && $posicao1 != $posicao3 && $posicao3 != $posicao2 ){

                        if($iniciais1 == $letra1 && $iniciais2 == $letra2 && $iniciais3 == $letra3){

                            $sql3=$db->query("SELECT nomeEtapa FROM etapas where id_etapa = '$idEtapa'"); 
                            $item3=$sql3->fetch();
                            $nomeEtapa=$item3['nomeEtapa'];
                            
                            
                            $_SESSION['string03'] .= "item <b>".$itemm."</b> na atividade <b>".$nomeAtividade."</b> na <b>".$nomeEtapa."</b></br>";
                            
                            
                        }

                    }

                    if ($posicao1 == $posicao2 && $posicao1 == $posicao3){

                        if($iniciais1 == $letra1 || $iniciais2 == $letra2 || $iniciais3 == $letra3){

                            $sql3=$db->query("SELECT nomeEtapa FROM etapas where id_etapa = '$idEtapa'"); 
                            $item3=$sql3->fetch();
                            $nomeEtapa=$item3['nomeEtapa'];

                            
                            $_SESSION['string03'] .= "item <b>".$itemm."</b> na atividade <b>".$nomeAtividade."<b/> na <b>".$nomeEtapa."</b></br>";
                          
                            
                        }

                    }

                    if ($posicao1 == $posicao2 && $posicao1 != $posicao3){

                        if( (($iniciais1 == $letra1) || ($iniciais2 == $letra2)) && ($iniciais3 == $letra3) ){

                            $sql3=$db->query("SELECT nomeEtapa FROM etapas where id_etapa = '$idEtapa'"); 
                            $item3=$sql3->fetch();
                            $nomeEtapa=$item3['nomeEtapa'];
                            
                            
                            $_SESSION['string03'] .= "item <b>".$itemm."</b> na atividade <b>".$nomeAtividade."</b> na <b>".$nomeEtapa."</b></br>";
                            
                            
                        }

                    }

                    if ($posicao1 == $posicao3 && $posicao1 != $posicao2){

                        if( (($iniciais1 == $letra1) || ($iniciais3 == $letra3)) && ($iniciais2 == $letra2) ){

                            $sql3=$db->query("SELECT nomeEtapa FROM etapas where id_etapa = '$idEtapa'"); 
                            $item3=$sql3->fetch();
                            $nomeEtapa=$item3['nomeEtapa'];

                            
                            $_SESSION['string03'] .= "item <b>".$itemm."</b> na atividade <b>".$nomeAtividade."</b> na <b>".$nomeEtapa."</b></br>";
                            
                            
                        }

                    }

                    if ($posicao2 == $posicao3 && $posicao2 != $posicao1){

                        if( (($iniciais2 == $letra2) || ($iniciais3 == $letra3)) && ($iniciais1 == $letra1) ){

                            $sql3=$db->query("SELECT nomeEtapa FROM etapas where id_etapa = '$idEtapa'"); 
                            $item3=$sql3->fetch();
                            $nomeEtapa=$item3['nomeEtapa'];

                            
                            $_SESSION['string03'] .= "item <b>".$itemm."</b> na atividade <b>".$nomeAtividade."</b> na <b>".$nomeEtapa."</b></br>";
                            
                            
                        }

                    }

                    

                }
            }
        }
	

      }    
 
    
    	if($_SESSION['qualidadeSelect'] == 1){
    		$_SESSION['string01'] ="Esse são todos os itens  do processo ({$dado['nomeProcesso']}) que atende os requisitos passado pelo usuário.<br/>  os requisitos são:<br/><br/>";

            $_SESSION['string02'] ="Requisito 01: todos que tenham  {$nomeItem}-{$nomeOpcao}";

    	}else if ($_SESSION['qualidadeSelect'] == 2){
 			$_SESSION['string'] ="Esse são todos os itens  do processo ({$dado['nomeProcesso']}) que atende os requesitos passado pelo usuário.<br/>  os requesitso são:<br/><br/>";

            $_SESSION['string02']= "Requisito 1: todos que tenha  {$nomeItem1}-{$nomeOpcao1}<br/> Requisito 2: todos que tenha {$nomeItem2}-{$nomeOpcao2}";
    	}else{
            $_SESSION['string01'] ="Esse são todos os itens  do processo ({$dado['nomeProcesso']}) que atende os requesitos passado pelo usuário.<br/>  os requesitso são:";
            $_SESSION['string02'] ="<br/><br/>Parâmento 1: todos que tenha  {$nomeItem1}: {$nomeOpcao1}<br/>Parâmento 2: todos que tenha  {$nomeItem2}: {$nomeOpcao2}<br/> Parâmento 3: todos que tenha  {$nomeItem3}: {$nomeOpcao3}";
        }          

    }else{

        header("Location: login.php");
    }


    

?>