<?php
    
    
    if(!isset($_SESSION)){
      session_start();
    }

    

        

    
    $nomeP0= null;
    $nomeP1= null;
    $nomeP2= null;
    

    $subnomeP0L0= null;
    $subnomeP0L1= null;
    $subnomeP0L2= null;
    $subnomeP1L0= null;
    $subnomeP1L1= null;
    $subnomeP1L2= null;
    $subnomeP2L0= null;
    $subnomeP2L1= null;
    $subnomeP2L2= null;

    $valorP0L0= null;
    $valorP0L1= null;
    $valorP0L2= null;
    $valorP1L0= null;
    $valorP1L1= null;
    $valorP1L2= null;
    $valorP2L0= null;
    $valorP2L1= null;
    $valorP2L2= null;

    function calculando( $iniciais, $item, $posicao){
        
        switch($item){

                            case "valor":

                               $letra=substr($iniciais, -12,1);

                               switch($letra){

                                    case 'P':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Valor";
                                            $GLOBALS["subnomeP0L0"]="Positivo";
                                            $GLOBALS["valorP0L0"]++;


                                        }else if (posicao == 1){

                                            $GLOBALS["nomeP1"]="Valor";
                                            $GLOBALS["subnomeP1L0"]="Positivo";
                                            $GLOBALS["valorP1L0"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Valor";
                                            $GLOBALS["subnomeP2L0"]="Positivo";
                                            $GLOBALS["valorP2L0"]++;
                                        }
                                        
                                        
                                        

                                    break;

                                    case 'N':

                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Valor";
                                            $GLOBALS["subnomeP0L1"]="Negativo";
                                            $GLOBALS["valorP0L1"]++;

                                        }else if (posicao == 1){

                                            $GLOBALS["nomeP1"]="Valor";
                                            $GLOBALS["subnomeP1L1"]="Negativo";
                                            $GLOBALS["valorP1L1"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Valor";
                                            $GLOBALS["subnomeP2L1"]="Negativo";
                                            $GLOBALS["valorP2L1"]++;
                                        }
                                        
                                    break;

                                   
                                }

                            break;

                             case 'dinamica':
                               
                                $letra=substr($iniciais, -8,1);

                                switch($letra){

                                     case 'T':

                                         if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Dinâmica";
                                            $GLOBALS["subnomeP0L0"]="Temporário cíclico";
                                            $GLOBALS["valorP0L0"]++;

                                         }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Dinâmica";
                                            $GLOBALS["subnomeP1L0"]="Temporário cíclico";
                                            $GLOBALS["valorP1L0"]++;

                                         }else{

                                            $GLOBALS["nomeP2"]="Dinâmica";
                                            $GLOBALS["subnomeP2L0"]="Temporário cíclico";
                                            $GLOBALS["valorP2L0"]++;
                                         }

                                     break;

                                     case 'C':
                                        
                                        
                                         if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Dinâmica";
                                            $GLOBALS["subnomeP0L1"]="Cíclico";
                                            $GLOBALS["valorP0L1"]++;

                                         }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Dinâmica";
                                            $GLOBALS["subnomeP1L1"]="Cíclico";
                                            $GLOBALS["valorP1L1"]++;

                                         }else{

                                            $GLOBALS["nomeP2"]="Dinâmica";
                                            $GLOBALS["subnomeP2L1"]="Cíclico";
                                            $GLOBALS["valorP2L1"]++;
                                         }

                                     break;

                                     case 'P':
                                        
                                         
                                         if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Dinâmica";
                                            $GLOBALS["subnomeP0L2"]="Permanente";
                                            $GLOBALS["valorP0L2"]++;

                                         }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Dinâmica";
                                            $GLOBALS["subnomeP1L2"]="Permanente";
                                            $GLOBALS["valorP1L2"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Dinâmica";
                                            $GLOBALS["subnomeP2L2"]="Permanente";
                                            $GLOBALS["valorP2L2"]++;
                                        }

                                    break;

                                    
                                }
                               
                            break;

                         case 'significancia':
                               
                               
                            $letra=substr($iniciais, -4,1);
                               
                            switch($letra){

                                 case 'P':
                                        
                                    if($posicao == 0){

                                        $GLOBALS["nomeP0"]="Significância";
                                        $GLOBALS["subnomeP0L0"]="Pequena";
                                        $GLOBALS["valorP0L0"]++;

                                    }else if ($posicao == 1){

                                        $GLOBALS["nomeP1"]="Significância";
                                        $GLOBALS["subnomeP1L0"]="Pequena";
                                        $GLOBALS["valorP1L0"]++;

                                    }else{

                                        $GLOBALS["nomeP2"]="Significância";
                                        $GLOBALS["subnomeP2L0"]="Pequena";
                                        $GLOBALS["valorP2L0"]++;
                                    }

                                 break;

                                 case 'M':
                                        
                                    if($posicao == 0){

                                        $GLOBALS["nomeP0"]="Significância";
                                        $GLOBALS["subnomeP0L1"]="Média";
                                        $GLOBALS["valorP0L1"]++;

                                     }else if ($posicao == 1){

                                        $GLOBALS["nomeP1"]="Significância";
                                        $GLOBALS["subnomeP1L1"]="Média";
                                        $GLOBALS["valorP1L1"]++;

                                     }else{

                                        $GLOBALS["nomeP2"]="Significância";
                                        $GLOBALS["subnomeP2L1"]="Média";
                                        $GLOBALS["valorP2L1"]++;
                                     }

                                 break;

                                 case 'G':
                                        
                                    if($posicao == 0){

                                        $GLOBALS["nomeP0"]="Significância";
                                        $GLOBALS["subnomeP0L2"]="Grande";
                                        $GLOBALS["valorP0L2"]++;

                                     }else if ($posicao == 1){

                                        $GLOBALS["nomeP1"]="Significância";
                                        $GLOBALS["subnomeP1L2"]="Grande";
                                        $GLOBALS["valorP1L2"]++;

                                     }else{

                                        $GLOBALS["nomeP2"]="Significância";
                                        $GLOBALS["subnomeP2L2"]="Grande";
                                        $GLOBALS["valorP2L2"]++;
                                     }

                                 break;


                             }

                         break;

                         case 'ordem':
                               
                            $letra=substr($iniciais, -11,1);
                               
                            switch($letra){

                                 case 'D':
                                        
                                    if($posicao == 0){

                                        $GLOBALS["nomeP0"]="Ordem";
                                        $GLOBALS["subnomeP0L0"]="Direto";
                                        $GLOBALS["valorP0L0"]++;

                                    }else if ($posicao == 1){

                                        $GLOBALS["nomeP1"]="Ordem";
                                        $GLOBALS["subnomeP1L0"]="Direto";
                                        $GLOBALS["valorP1L0"]++;

                                    }else{

                                        $GLOBALS["nomeP2"]="Ordem";
                                        $GLOBALS["subnomeP2L0"]="Direto";
                                        $GLOBALS["valorP2L0"]++;
                                    }

                                 break;

                                 case 'I':
                                        
                                    if($posicao == 0){

                                        $GLOBALS["nomeP"]="Ordem";
                                        $GLOBALS["subnomeP0L1"]="Indireto";
                                        $GLOBALS["valorP0L1"]++;

                                    }else if ($posicao == 1){

                                        $GLOBALS["nomeP1"]="Ordem";
                                        $GLOBALS["subnomeP1L1"]="Indireto";
                                        $GLOBALS["valorP1L1"]++;

                                    }else{

                                        $GLOBALS["nomeP2"]="Ordem";
                                        $GLOBALS["subnomeP2L1"]="Iireto";
                                        $GLOBALS["valorP2L1"]++;
                                    }

                                 break;


                                    
                             }

                         break;

                             case 'plastica':
                               
                               
                                $letra=substr($iniciais, -7,1);
                               
                                switch($letra){

                                     case 'R':
                                        
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Plástica";
                                            $GLOBALS["subnomeP0L0"]="Reversível";
                                            $GLOBALS["valorP0L0"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Plástica";
                                            $GLOBALS["subnomeP1L0"]="Reversível";
                                            $GLOBALS["valorP1L0"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Plástica";
                                            $GLOBALS["subnomeP2L0"]="Reversível";
                                            $GLOBALS["valorP2L0"]++;
                                        }

                                     break;

                                     case 'I':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Plástica";
                                            $GLOBALS["subnomeP0L1"]="Irreversível";
                                            $GLOBALS["valorP0L1"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Plástica";
                                            $GLOBALS["subnomeP1L1"]="Irreversível";
                                            $GLOBALS["valorP1L1"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Plástica";
                                            $GLOBALS["subnomeP2L1"]="Irreversível";
                                            $GLOBALS["valorP2L1"]++;
                                        }

                                     break;

                                    
                                 }

                             break;

                             case 'sensibilidade':
                               
                                $letra=substr($iniciais, -3,1);

                                switch($letra){

                                     case 'B':
                                        
                                         
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Sensibilidade";
                                            $GLOBALS["subnomeP0L0"]="Baixa";
                                            $GLOBALS["valorP0L0"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Sensibilidade";
                                            $GLOBALS["subnomeP1L0"]="Baixa";
                                            $GLOBALS["valorP1L0"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Sensibilidade";
                                            $GLOBALS["subnomeP2L0"]="Baixa";
                                            $GLOBALS["valorP2L0"]++;
                                        }                                        

                                     break;

                                     case 'M':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Sensibilidade";
                                            $GLOBALS["subnomeP0L1"]="Média";
                                            $GLOBALS["valorP0L1"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Sensibilidade";
                                            $GLOBALS["subnomeP1L1"]="Média";
                                            $GLOBALS["valorP1L1"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Sensibilidade";
                                            $GLOBALS["subnomeP2L1"]="Média";
                                            $GLOBALS["valorP2L1"]++;
                                        }

                                     break;

                                     case 'A':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Sensibilidade";
                                            $GLOBALS["subnomeP0L2"]="Alta";
                                            $GLOBALS["valorP0L2"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Sensibilidade";
                                            $GLOBALS["subnomeP1L2"]="Alta";
                                            $GLOBALS["valorP1L2"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Sensibilidade";
                                            $GLOBALS["subnomeP2L2"]="Alta";
                                            $GLOBALS["valorP2L2"]++;
                                        }

                                     break;

                                    
                                 }
                               

                             break;

                             case 'espacial':
                               
                                $letra=substr($iniciais, -10,1);

                                switch($letra){

                                     case 'L':

                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Espacial";
                                            $GLOBALS["subnomeP0L0"]="Local";
                                            $GLOBALS["valorP0L0"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Espacial";
                                            $GLOBALS["subnomeP1L0"]="Local";
                                            $GLOBALS["valorP1L0"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Espacial";
                                            $GLOBALS["subnomeP2L0"]="Local";
                                            $GLOBALS["valorP2L0"]++;
                                        }

                                     break;

                                     case 'R':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Espacial";
                                            $GLOBALS["subnomeP0L1"]="Regional";
                                            $GLOBALS["valorP0L1"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Espacial";
                                            $GLOBALS["subnomeP1L1"]="Regional";
                                            $GLOBALS["valorP1L1"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Espacial";
                                            $GLOBALS["subnomeP2L1"]="Regional";
                                            $GLOBALS["valorP2L1"]++;
                                        }

                                     break;

                                     case 'E':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Espacial";
                                            $GLOBALS["subnomeP0L2"]="Estratégico";
                                            $GLOBALS["valorP0L2"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Espacial";
                                            $GLOBALS["subnomeP1L2"]="Estratégico";
                                            $GLOBALS["valorP1L2"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Espacial";
                                            $GLOBALS["subnomeP2L2"]="Estratégico";
                                            $GLOBALS["valorP2L2"]++;
                                        }

                                     break;

                                    
                                 }
                               

                             break;

                             case 'cumulatividade':
                               
                               
                                $letra=substr($iniciais, -6,1);
                               
                                switch($letra){

                                     case 'P':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Cumulatividade";
                                            $GLOBALS["subnomeP0L0"]="Presente";
                                            $GLOBALS["valorP0L0"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Cumulatividade";
                                            $GLOBALS["subnomeP1L0"]="Presente";
                                            $GLOBALS["valorP1L0"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Cumulatividade";
                                            $GLOBALS["subnomeP2L0"]="Presente";
                                            $GLOBALS["valorP2L0"]++;
                                        }

                                     break;

                                     case 'A':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Cumulatividade";
                                            $GLOBALS["subnomeP0L1"]="Ausente";
                                            $GLOBALS["valorP0L1"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Cumulatividade";
                                            $GLOBALS["subnomeP1L1"]="Ausente";
                                            $GLOBALS["valorP1L1"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Cumulatividade";
                                            $GLOBALS["subnomeP2L1"]="Ausente";
                                            $GLOBALS["valorP2L1"]++;
                                        }

                                     break;

                                    
                                 }

                             break;

                             case 'condicoes':
                               
                                $letra=substr($iniciais, -2,1);

                                switch($letra){

                                     case 'N':
                                        
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Condicões";
                                            $GLOBALS["subnomeP0L0"]="Normais";
                                            $GLOBALS["valorP0L0"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Condicões";
                                            $GLOBALS["subnomeP1L0"]="Normais";
                                            $GLOBALS["valorP1L0"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Condicões";
                                            $GLOBALS["subnomeP2L0"]="Normais";
                                            $GLOBALS["valorP2L0"]++;
                                        }

                                     break;

                                     case 'A':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Condicões";
                                            $GLOBALS["subnomeP0L1"]="Anormais";
                                            $GLOBALS["valorP0L1"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Condicões";
                                            $GLOBALS["subnomeP1L1"]="Anormais";
                                            $GLOBALS["valorP1L1"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Condicões";
                                            $GLOBALS["subnomeP2L1"]="Anormais";
                                            $GLOBALS["valorP2L1"]++;
                                        }

                                     break;

                                    
                                 }
                               
                             break;

                             case 'temporal':
                               
                               
                                $letra=substr($iniciais, -9,1);
                               
                                switch($letra){

                                     case 'C':

                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Temporal";
                                            $GLOBALS["subnomeP0L0"]="Curto prazo";
                                            $GLOBALS["valorP0L0"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Temporal";
                                            $GLOBALS["subnomeP1L0"]="Curto prazo";
                                            $GLOBALS["valorP1L0"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Temporal";
                                            $GLOBALS["subnomeP2L0"]="Curto prazo";
                                            $GLOBALS["valorP2L0"]++;
                                        }

                                     break;

                                     case 'M':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Temporal";
                                            $GLOBALS["subnomeP0L1"]="Médio prazo";
                                            $GLOBALS["valorP0L1"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Temporal";
                                            $GLOBALS["subnomeP1L1"]="Médio prazo";
                                            $GLOBALS["valorP1L1"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Temporal";
                                            $GLOBALS["subnomeP2L1"]="Médio prazo";
                                            $GLOBALS["valorP2L1"]++;
                                        }

                                     break;

                                     case 'L':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Temporal";
                                            $GLOBALS["subnomeP0L2"]="Longo prazo";
                                            $GLOBALS["valorP0L2"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Temporal";
                                            $GLOBALS["subnomeP1L2"]="Longo prazo";
                                            $GLOBALS["valorP1L2"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Temporal";
                                            $GLOBALS["subnomeP2L2"]="Longo prazo";
                                            $GLOBALS["valorP2L2"]++;
                                        }

                                     break;


                                 }


                             break;

                             case 'magnitude':
                               
                                $letra=substr($iniciais, -5,1);
                               
                                switch($letra){

                                     case 'F':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Magnitude";
                                            $GLOBALS["subnomeP0L0"]="Fraco";
                                            $GLOBALS["valorP0L0"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Magnitude";
                                            $GLOBALS["subnomeP1L0"]="Fraco";
                                            $GLOBALS["valorP1L0"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Magnitude";
                                            $GLOBALS["subnomeP2L0"]="Fraco";
                                            $GLOBALS["valorP2L0"]++;
                                        }

                                     break;

                                     case 'M':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Magnitude";
                                            $GLOBALS["subnomeP0L1"]="Médio";
                                            $GLOBALS["valorP0L1"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Magnitude";
                                            $GLOBALS["subnomeP1L1"]="Médio";
                                            $GLOBALS["valorP1L1"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Magnitude";
                                            $GLOBALS["subnomeP2L1"]="Médio";
                                            $GLOBALS["valorP2L1"]++;
                                        }

                                     break;

                                     case 'O':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Magnitude";
                                            $GLOBALS["subnomeP0L2"]="Forte";
                                            $GLOBALS["valorP0L2"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Magnitude";
                                            $GLOBALS["subnomeP1L2"]="Forte";
                                            $GLOBALS["valorP1L2"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Magnitude";
                                            $GLOBALS["subnomeP2L2"]="Forte";
                                            $GLOBALS["valorP2L2"]++;
                                        }

                                     break;

                                    
                                 }

                             break;

                             case 'resistencia':
                               
                                $letra=substr($iniciais, -1,1);
                                switch($letra){

                                     case 'I':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Resistência";
                                            $GLOBALS["subnomeP0L0"]="Irredutível";
                                            $GLOBALS["valorP0L0"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Resistência";
                                            $GLOBALS["subnomeP1L0"]="Irredutível";
                                            $GLOBALS["valorP1L0"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Resistência";
                                            $GLOBALS["subnomeP2L0"]="Irredutível";
                                            $GLOBALS["valorP2L0"]++;
                                        }

                                     break;

                                     case 'M':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Resistência";
                                            $GLOBALS["subnomeP0L1"]="Mitigável";
                                            $GLOBALS["valorP0L1"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Resistência";
                                            $GLOBALS["subnomeP1L1"]="Mitigável";
                                            $GLOBALS["valorP1L1"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Resistência";
                                            $GLOBALS["subnomeP2L1"]="Mitigável";
                                            $GLOBALS["valorP2L1"]++;
                                        }

                                     break;

                                     case 'E':
                                        
                                        if($posicao == 0){

                                            $GLOBALS["nomeP0"]="Resistência";
                                            $GLOBALS["subnomeP0L2"]="Resistência";
                                            $GLOBALS["valorP0L2"]++;

                                        }else if ($posicao == 1){

                                            $GLOBALS["nomeP1"]="Resistência";
                                            $GLOBALS["subnomeP1L2"]="Resistência";
                                            $GLOBALS["valorP1L2"]++;

                                        }else{

                                            $GLOBALS["nomeP2"]="Resistência";
                                            $GLOBALS["subnomeP2L2"]="Resistência";
                                            $GLOBALS["valorP2L2"]++;
                                        }

                                     break;

                                    
                                 }

                             break;

                            
                         }
            
    }
    
     require_once("banco2.php");
    require_once("banco1.php");
    
    
    if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        
        $idUsuario=$_SESSION ['idUsuario'];
        $idProcesso= $_POST['nomeProcessoG'];
        $tamanhoVetor=count($_POST['item']);

        $sql=$db->query("SELECT nomeProcesso FROM processos WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");
        $dado= $sql->fetch();
        


        $sql=$db->query("SELECT id_atividade FROM atividades WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");
        $saida0 =  array('nome','subnome[]');
        $saida1 =  array('nome','subnome[]');
        $saida2 =  array('nome','subnome[]');
        $total;
        if($sql->rowCount()>0){
            
            foreach ($sql->fetchAll() as $item1){
                
                $idAtividade =$item1['id_atividade'];

                $sql2=$db->query("SELECT * FROM itens WHERE id_atividade = '$idAtividade'");


                foreach($sql2->fetchAll() as $item2){
                    $iniciais = $item2['iniciais']; 
                    if($tamanhoVetor == 1){
                        
                        calculando($iniciais, $_POST['item'][0],0);
                        

                    }else if($tamanhoVetor == 2){

                        calculando($iniciais, $_POST['item'][0],0);
                        calculando($iniciais, $_POST['item'][1],1);

                    }else{
                        
                        calculando($iniciais, $_POST['item'][0],0);
                        calculando($iniciais, $_POST['item'][1],1);
                        calculando($iniciais, $_POST['item'][2],2);
                        
                    }

                }     

                
            }

        }        
          
            
            //header("Location: gerargraficofront.php");
        
        	// echo '<pre>';
        	// print_r($_POST);
        	// echo '</pre>';
        

    }else{

        header("Location: login.php");
    }
    

?>

	