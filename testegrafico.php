<?php
    
    
    if(!isset($_SESSION)){
      session_start();
    }
    
    require_once("banco2.php");
    require_once("banco1.php");

    $idUsuario=$_SESSION ['idUsuario'];
    $idProcesso= $_POST['nomeProcessoG'];
    $sqll=$db->query("SELECT nomeProcesso FROM processos WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");

    $dado= $sqll->fetch();
    $_SESSION['telaProcesso'] ="Nesse gráfico mostraremos a quantidade e porcentagem dos itens cadastrado no processo ({$dado['nomeProcesso']}) a partir dos parâmentos passado pelo o usuário" ;
        

    $sql=$db->query("SELECT id_atividade FROM atividades WHERE id_processo = '$idProcesso' AND id_usuario = '$idUsuario'");


    // echo $idProcesso;
    // echo "</br>"; 

    $string01="";
    $string02="";
    $string03="";
    $posicao01= null;
    $posicao02= null;
    $posicao03= null;
    $tamanho=count($_POST['item']);
  
    if(isset($_POST['item'][0])){
      $x = explode("-", $_POST['item'][0]);
      switch ($x[1]){
        case '1':
          $string01=$string01."PN";
          $posicao01= 1;
          $nome01="Valor";
          $subnome01['nome'][0]="Positivo";
          $subnome01['nome'][1]="Negativo";
        break;

        case '2':
          $string01=$string01."DI";
          $posicao01= 2;
          $nome01="Ordem";
          $subnome01['nome'][0]="Direto";
          $subnome01['nome'][1]="Indireto";
        break;

        case '3':
          $string01=$string01."LRE";
          $posicao01= 3;
          $nome01="Espacial";
          $subnome01['nome'][0]="Local";
          $subnome01['nome'][1]="Regional";
          $subnome01['nome'][2]="Estratégico";
        break;


        case '4':
          $string01=$string01."CML";
          $posicao01= 4;
          $nome01="Temporal";
          $subnome01['nome'][0]="Curto Prazo";
          $subnome01['nome'][1]="Médio Prazo";
          $subnome01['nome'][2]="Longo Prazo";
        break;

        case '5':
          $string01=$string01."TCP";
          $posicao01= 5;
          $nome01="Dinâmica";
          $subnome01['nome'][0]="Temporário";
          $subnome01['nome'][1]="Cíclico";
          $subnome01['nome'][2]="Permanente";
        break;

        case '6':
          $string01=$string01."RI";
          $posicao01= 6;
          $nome01="Plástica";
          $subnome01['nome'][0]="Reversível";
          $subnome01['nome'][1]="irreversível";
        break;

        case '7':
          $string01=$string01."PA";
          $posicao01= 7;
          $nome01="Cumulatividade";
          $subnome01['nome'][0]="Presente";
          $subnome01['nome'][1]="Ausente";
        break;

        case '8':
          $string01=$string01."FMO";
          $posicao01= 8;
          $nome01="Magnitude";
          $subnome01['nome'][0]="Fraco";
          $subnome01['nome'][1]="Médio";
          $subnome01['nome'][2]="Forte";
        break;

        case '9':
          $string01=$string01."PMG";
          $posicao01= 9;
          $nome01="Signicância";
          $subnome01['nome'][0]="Pequena";
          $subnome01['nome'][1]="Média";
          $subnome01['nome'][2]="Grande";
        break;

        case '10':
          $string01=$string01."BMA";
          $posicao01= 10;
          $nome01="Sensibilidade";
          $subnome01['nome'][0]="Baixa";
          $subnome01['nome'][1]="Média";
          $subnome01['nome'][2]="Alta";
        break;

        case '11':
          $string01=$string01."NA";
          $posicao01= 11;
          $nome01="Condições";
          $subnome01['nome'][0]="Normais";
          $subnome01['nome'][1]="Anormais";
        break;

        case '12':
          $string01=$string01."IME";
          $posicao01= 12;
          $nome01="Resistência";
          $subnome01['nome'][0]="Irredutível";
          $subnome01['nome'][1]="Mitigável";
          $subnome01['nome'][2]="Eliminável";
        break;


      }
    }

    if(isset($_POST['item'][1])){
      $y = explode("-", $_POST['item'][1]);
      switch ($y[1]){
        case '1':
          $string02=$string02."PN";
          $posicao02= 1;
          $nome02="Valor";
          $subnome02['nome'][0]="Positivo";
          $subnome02['nome'][1]="Negativo";
        break;

        case '2':
          $string02=$string02."DI";
          $posicao02= 2;
          $nome02="Ordem";
          $subnome02['nome'][0]="Direto";
          $subnome02['nome'][1]="Indireto";
        break;

        case '3':
          $string02=$string02."LRE";
          $posicao02= 3;
          $nome02="Espacial";
          $subnome02['nome'][0]="Local";
          $subnome02['nome'][1]="Regional";
          $subnome02['nome'][2]="Estratégico";
        break;


        case '4':
          $string02=$string02."CML";
          $posicao02= 4;
          $nome02="Temporal";
          $subnome02['nome'][0]="Curto Prazo";
          $subnome02['nome'][1]="Médio Prazo";
          $subnome02['nome'][2]="Longo Prazo";
        break;

        case '5':
          $string02=$string02."TCP";
          $posicao02= 5;
          $nome02="Dinâmica";
          $subnome02['nome'][0]="Temporário";
          $subnome02['nome'][1]="Cíclico";
          $subnome02['nome'][2]="Permanente";
        break;

        case '6':
          $string02=$string02."RI";
          $posicao02= 6;
          $nome02="Plástica";
          $subnome02['nome'][0]="Reversível";
          $subnome02['nome'][1]="irreversível";
        break;

        case '7':
          $string02=$string02."PA";
          $posicao02= 7;
          $nome02="Cumulatividade";
          $subnome02['nome'][0]="Presente";
          $subnome02['nome'][1]="Ausente";
        break;

        case '8':
          $string02=$string02."FMO";
          $posicao02= 8;
          $nome02="Magnitude";
          $subnome02['nome'][0]="Fraco";
          $subnome02['nome'][1]="Médio";
          $subnome02['nome'][2]="Forte";
        break;

        case '9':
          $string02=$string02."PMG";
          $posicao02= 9;
          $nome02="Signicância";
          $subnome02['nome'][0]="Pequena";
          $subnome02['nome'][1]="Média";
          $subnome02['nome'][2]="Grande";
        break;

        case '10':
          $string02=$string02."BMA";
          $posicao02= 10;
          $nome02="Sensibilidade";
          $subnome02['nome'][0]="Baixa";
          $subnome02['nome'][1]="Média";
          $subnome02['nome'][2]="Alta";
        break;

        case '11':
          $string02=$string02."NA";
          $posicao02= 11;
          $nome02="Condições";
          $subnome02['nome'][0]="Normais";
          $subnome02['nome'][1]="Anormais";
        break;

        case '12':
          $string02=$string02."IME";
          $posicao02= 12;
          $nome02="Resistência";
          $subnome02['nome'][0]="Irredutível";
          $subnome02['nome'][1]="Mitigável";
          $subnome02['nome'][2]="Eliminável";
        break;


      }
    }   
    

    if(isset($_POST['item'][2])){
      $z = explode("-", $_POST['item'][2]);
      switch ($z[1]){
        case '1':
          $string03=$string03."PN";
          $posicao03= 1;
          $nome03="Valor";
          $subnome03['nome'][0]="Positivo";
          $subnome03['nome'][1]="Negativo";
        break;

        case '2':
          $string03=$string03."DI";
          $posicao03= 2;
          $nome03="Ordem";
          $subnome03['nome'][0]="Direto";
          $subnome03['nome'][1]="Indireto";
        break;

        case '3':
          $string03=$string03."LRE";
          $posicao03= 3;
          $nome03="Espacial";
          $subnome03['nome'][0]="Local";
          $subnome03['nome'][1]="Regional";
          $subnome03['nome'][2]="Estratégico";
        break;


        case '4':
          $string03=$string03."CML";
          $posicao03= 4;
          $nome03="Temporal";
          $subnome03['nome'][0]="Curto Prazo";
          $subnome03['nome'][1]="Médio Prazo";
          $subnome03['nome'][2]="Longo Prazo";
        break;

        case '5':
          $string03=$string03."TCP";
          $posicao03= 5;
          $nome03="Dinâmica";
          $subnome03['nome'][0]="Temporário";
          $subnome03['nome'][1]="Cíclico";
          $subnome03['nome'][2]="Permanente";
        break;

        case '6':
          $string03=$string03."RI";
          $posicao03= 6;
          $nome03="Plástica";
          $subnome03['nome'][0]="Reversível";
          $subnome03['nome'][1]="irreversível";
        break;

        case '7':
          $string03=$string03."PA";
          $posicao03= 7;
          $nome03="Cumulatividade";
          $subnome03['nome'][0]="Presente";
          $subnome03['nome'][1]="Ausente";
        break;

        case '8':
          $string03=$string03."FMO";
          $posicao03= 8;
          $nome03="Magnitude";
          $subnome03['nome'][0]="Fraco";
          $subnome03['nome'][1]="Médio";
          $subnome03['nome'][2]="Forte";
        break;

        case '9':
          $string03=$string03."PMG";
          $posicao03= 9;
          $nome03="Signicância";
          $subnome03['nome'][0]="Pequena";
          $subnome03['nome'][1]="Média";
          $subnome03['nome'][2]="Grande";
        break;

        case '10':
          $string03=$string03."BMA";
          $posicao03= 10;
          $nome03="Sensibilidade";
          $subnome03['nome'][0]="Baixa";
          $subnome03['nome'][1]="Média";
          $subnome03['nome'][2]="Alta";
        break;

        case '11':
          $string03=$string03."NA";
          $posicao03= 11;
          $nome03="Condições";
          $subnome03['nome'][0]="Normais";
          $subnome03['nome'][1]="Anormais";
        break;

        case '12':
          $string03=$string03."IME";
          $posicao03= 12;
          $nome03="Resistência";
          $subnome03['nome'][0]="Irredutível";
          $subnome03['nome'][1]="Mitigável";
          $subnome03['nome'][2]="Eliminável";
        break;


      }
    }
// passando nome para os paramentros  vetor de tamanho 1
    if ($tamanho == 1){
      $stringMestre = array();
      $stringMestre['nome']=$nome01;
      // echo $stringMestre['nome'];
      // echo"</br>";

      for ($i=0;$i<strlen($string01);$i++){
        $stringMestre['subnome'][$i]=$subnome01['nome'][$i];
        $stringMestre['quantidade'][$i]=0;
      }

    }

// passando nome para os paramentros  vetor de tamanho 2

    if ($tamanho == 2){
      $cont=0;
      $stringMestre = array();
      $stringMestre['nome']="{$nome01}/{$nome02}";
      // echo $stringMestre['nome'];
      // echo"</br>";

      for ($i=0;$i<strlen($string01);$i++){
        for($j=0;$j<strlen($string02);$j++){
          $stringMestre['subnome'][$cont]="{$subnome01['nome'][$i]}/{$subnome02['nome'][$j]}";
          $stringMestre['quantidade'][$cont]=0;
          $cont++;
        }
      }

    }


// passando nome para os paramentros  vetor de tamanho 3

    if ($tamanho == 3){
      $cont=0;
      $stringMestre = array();
      $stringMestre['nome']="{$nome01}/{$nome02}/{$nome03}";
      // echo $stringMestre['nome'];
      // echo"</br>";

      for ($i=0;$i<strlen($string01);$i++){
        for($j=0;$j<strlen($string02);$j++){
          for($k=0;$k<strlen($string03);$k++){

            $stringMestre['subnome'][$cont]="{$subnome01['nome'][$i]}/{$subnome02['nome'][$j]}/{$subnome03['nome'][$k]}";

            $stringMestre['quantidade'][$cont]=0;
            $cont++;
          }
        }
      }

    }
// final na nomeação dos paramentros

// inicio da quantidade/porcentagem dos intens 
    $testador=0;

  if($sql->rowCount()>0){
    $cont=0;
    foreach ($sql->fetchAll() as $item1){
      $idAtividade =$item1['id_atividade'];
      $sql2=$db->query("SELECT * FROM itens WHERE id_atividade = '$idAtividade'");

       foreach($sql2->fetchAll() as $item2){
          $iniciais = $item2['iniciais'];

          if ($tamanho == 1){
            $cont = strlen($string01);
            for($i=0;$i<strlen($string01);$i++){
              if($string01[$i] ==$iniciais[$posicao01] ){
                $stringMestre['quantidade'][$i]++;
              }
            }
          }else if ($tamanho == 2){
            $cont=0;
            for ($i=0;$i<strlen($string01);$i++){
              for($j=0;$j<strlen($string02);$j++){
                if($string01[$i] ==$iniciais[$posicao01] && $string02[$j] ==$iniciais[$posicao02]){
                  $stringMestre['quantidade'][$cont]++;
                }
                $cont++;
              }
            }
        }else {
          $cont=0;
          for ($i=0;$i<strlen($string01);$i++){
            for($j=0;$j<strlen($string02);$j++){
              for($k=0;$k<strlen($string03);$k++){
                if($string01[$i] == $iniciais[$posicao01] && 
                  $string02[$j] == $iniciais[$posicao02] && 
                  $string03[$k] == $iniciais[$posicao03]){
                  $stringMestre['quantidade'][$cont]++;

                }
                $cont++;
              }   
            }
          }
        } 
    }

  }
}
// final da quantidade/porcentagem dos intens

// inicios dos prints das informçoes

  // if($tamanho == 1){
  //   for($i=0;$i<$cont;$i++){
  //     echo "{$stringMestre['subnome'][$i]} = {$stringMestre['quantidade'][$i]}";
  //     echo"</br>";
  //   }
  
  // }else if($tamanho == 2){
  //   for ($i=0;$i<$cont;$i++){
  //     echo "{$stringMestre['subnome'][$cont]} = {$stringMestre['quantidade'][$cont]}";
  //     echo"</br>";  
      
  //   }   
    
  // }else{
  //   for ($i=0;$i<$cont;$i++){
  //     echo "{$stringMestre['subnome'][$i]} = {$stringMestre['quantidade'][$i]}";
  //     echo"</br>"; 
  //   }
  // }
   
  
?>