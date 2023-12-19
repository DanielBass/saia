<?php
    
    
    if(!isset($_SESSION)){
      session_start();
    }
    
    require_once("banco2.php");
    require_once("banco1.php");
    require_once("coloracao.php");
    
    
    if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario=$_SESSION ['idUsuario'];
    }else{

        header("Location: login.php");
    }
    

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- meu css -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <script src="script/script.js"></script>
    <script >

        
     
    </script>
    <title>Tabela</title>
  </head>
  <body>
    <div id="alertModal">
    </div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5 navbar-fixed-top">
      <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link"  href="index.php">HOME</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Cadastrar</a>
              <div class="dropdown-menu">

                <a class="nav-link  dropdown-item text-primary" data-toggle="modal" data-target="#modalProcesso" data-whatever="@pro" href="">Cadastrar Processo</a>

                <a class="nav-link  dropdown-item text-primary" data-toggle="modal" data-target="#modalEtapa" data-whatever="@eta" href="">Cadastrar Etapa</a>
                
                <a class="nav-link  dropdown-item text-primary"  href="cadastroatividade.php" >Cadastrar Atividade</a>

                <a class="nav-link  dropdown-item text-primary"  href="cadastrardiretoprocesso.php" >Cadastrar Direto</a>  

              </div>
              
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Visualizar</a>

              <div class="dropdown-menu">
                
                  <a class="nav-link dropdown-item text-primary"  href="mostrarprocesso.php">Processos</a>
                
                
                  <a class="nav-link dropdown-item text-primary"  href="mostraretapa.php">Etapas</a>
                 
                
                  <a class="nav-link dropdown-item text-primary"  href="tabela.php">Tabela</a>
                    
              </div>

            </li>

            

          </ul>
          
        </div>
      </div>
    </nav>

<form method="POST" id="formTabela">                              
  <div class="form-group">
    <div class="container">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="nomeProcessoT"  class="col-form-label">Selecione o processo:</label>
              <select name="nomeProcessoT" id="nomeProcessoT" class="form-control input-lg" data-live-search="true"> </select>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center">
      <button type="sumbit" class="btn btn-success mb-3" id="tabelaBotao" value="enviar" >Mostrar Tabela</button>  
  </div>
</form>

  <?php
    if(!isset($_SESSION)){
      session_start();
    }
    $itens[0]='Particulas sólidas';
    $itens[1]='Gases e vapores';
    $itens[2]='Contaminação da água';
    $itens[3]='Contaminação do solo';
    $itens[4]='Redução da diversidade';
    $itens[5]='Economia Local';
    $itens[6]='Infraestrutura';
    $itens[7]='Tecnologia';
    $itens[8]='Qualidade de vida';
    $itens[9]='Saúde';
    $itens[10]='Desenvolvimento Regional';
    $itens[11]='Paisagimos';
    $itens[12]='Qualidade do Produto Final';

    if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario=$_SESSION ['idUsuario'];
    }else{

      header("Location: login.php");
    }
    if ((isset($_POST['nomeProcessoT']) && !empty($_POST['nomeProcessoT'])) ||((isset($_SESSION['nomeProcessoT']) && $_SESSION['nomeProcessoT']))){

      
        if((isset($_POST['nomeProcessoT']) && !empty($_POST['nomeProcessoT']))){
          $idProcesso = $_POST['nomeProcessoT'];  
        }else{
          $idProcesso = $_SESSION['nomeProcessoT'];
        }        
        
         
      
      
      $sql=("SELECT * FROM processos WHERE id_processo='$idProcesso'");
      $sql=$db->query($sql);
      if($sql->rowCount() > 0){
        $item = $sql->fetch();
      }
      if (isset($item['nomeProcesso'])){
       $nomeProcesso=$item['nomeProcesso'];
      }

      for ($a=0;$a<1;$a++){
        echo "<table>";
        if (isset($nomeProcesso)){
          echo "<div class='text-center mb-3'><h1>".$nomeProcesso."</h1></div>";
        }
          
          
          

          for($i=0;$i<1;$i++){
            echo '<table border="1">';
              echo "<tr>";
                for($k=3;$k<=3;$k++){
                  echo "<td>Etapa</td>";
                  echo "<td>Atividade</td>";
                }
            
                for ($j=0;$j<=12;$j++){

                  echo "<td>".$itens[$j]."</td>";
                }
                                    echo "<td>alterar</td>";
                                    echo "<td>excluir</td>";
              echo "</tr>";
              
                $sql2= ("SELECT  id_etapa,nomeEtapa  FROM etapas WHERE id_processo= '$idProcesso' AND id_usuario='$idUsuario'");
                $sql2= $db->query($sql2);
                  if($sql2->rowCount() > 0){
                    foreach ($sql2->fetchAll() as $item2) {
                        
                        
                        
                        
                                                

                        $idEtapa =$item2['id_etapa'];

                        
                          $sql3= ("SELECT  id_atividade,nomeAtividade,id_etapa FROM atividades WHERE id_etapa = '$idEtapa' and id_usuario ='$idUsuario'
                            ");
                          $sql3= $db->query($sql3);

                          if($sql3->rowCount() > 0){
                            

                               

                            foreach ($sql3->fetchAll() as $item3) {
                              echo "<tr>";
                              $sql4=("SELECT * FROM etapas  WHERE id_etapa = '$idEtapa'");
                              $sql4=$db->query($sql4);
                               if($sql4->rowCount() > 0){
                                    $item4 = $sql4->fetch();
                                    $guardaEtapa=$item4['nomeEtapa'];
                                    echo"<td>".$item4['nomeEtapa']."</td>";  
                                }
                                echo "<td>".$item3['nomeAtividade']."</td>";
                                for ($j=0;$j<=12;$j++){

                                      $guardaItem=$itens[$j];
                                      $guardaIdAtividade=$item3['id_atividade'];
                                      $sql5=("SELECT * FROM itens WHERE id_atividade ='$guardaIdAtividade'
                                        AND item='$guardaItem'");

                                      $sql5=$db->query($sql5);

                                      if($sql5->rowCount()>0){
                                        $item5 =$sql5->fetch();
                                        $cor=coloracao($item5['iniciais']);
                                        
                                        if($cor=='RED' || $cor=='GREEN'){
                                          
                                          $fonte ="WHITE";

                                        }else{

                                            $fonte ='BLACK';
                                        }
                                        echo"<td bgcolor='".$cor."'> <font color='".$fonte."'>".$item5['iniciais']."</font></td>";
                                      }else{
                                        echo"<td>em Branco</td>";
                                      }

                                    }
                                    $teste =$item3['id_atividade'];
                                echo "<td><button  type='button' id='bAlterar".$item3['id_atividade']."' value='alteraratividade.php?id=".$item3['id_atividade']."'class='btn btn-warning bAlterar'  </button><i class='fas fa-cog'></i></td>";

                                echo "<td><button  type='button' id='bExcluir".$item3['id_atividade']."' value='deletaratividade.php?id=".$item3['id_atividade']."' class='btn btn-danger bExcluir'  </button><i class='far fa-trash-alt'></i></td>";

                               } 
                            }

                      

                                        
                                            //echo "<td>Excluir ".$item2['id']."</td>"; 
                      echo "</tr>";
                      
                    }
                  }else{
                   // echo "<h4>Não tem carta registrada para esse tipo de jogo</h4>";
                  }
            echo "</table>";
          }
        
      }
    }
    ?>
<!--modal de cadastro de processos-->
<div class="modal fade" id="modalProcesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo Processo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formProcesso">
          <div class="form-group">
            <label for="nomeProcesso" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="nomeProcesso" name="nome" placeholder="Digite nome do processo">
          </div>
          <div class="form-group">
            <label for="obsevacao" class="col-form-label">Obsevação:</label>
            <textarea class="form-control"name="observacao" id="observacao" placeholder=""></textarea>
          </div>
        </form>
        <div id="mensagem1" class="text-primary lg-text mt-1 mensagem"align="center"></div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="far fa-times-circle"></i>&nbsp;Sair</button>
        <button type="button" class="btn btn-success" id="cadastrarProcesso" ><i class="far fa-save"></i>&nbsp;Cadastrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fim modal de cadastro de processos-->

<!--  modal de cadastro de etapa-->
<div class="modal fade" id="modalEtapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar nova Etapa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formEtapa">
          <div class="form-group">
            <label for="nomeProcessoE" class="col-form-label">Selecione o processo:</label>
            <select name="nomeProcessoE" id="nomeProcessoE" class="form-control input-lg" data-live-search="true"> </select>
          </div>
          <div class="form-group">
            <label for="nomeEtapa" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="nomeEtapa" name="nomeEtapa" placeholder="Digite nome da Etapa">
          </div>
          <div class="form-group">
            <label for="obsevacao" class="col-form-label">Obsevação:</label>
            <textarea class="form-control"name="observacao" id="observacaoEtapa" placeholder=""></textarea>
          </div>
        </form>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="far fa-times-circle"></i>&nbsp;Sair</button>
        <button type="button" class="btn btn-success" id="cadastrarEtapa" ><i class="far fa-save"></i>&nbsp;Cadastrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fim modal de cadastro de etapa-->





<!--jQuery do ajax-->









<!-- fim de modal de cadastro de processos-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--jQuery do ajax-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript">
  //principal função do jquery
  
  let $alertModal =document.querySelector('#alertModal')

$(document).ready(function(){
  
 $('.bExcluir').on('click', function(e) {
    
    e.preventDefault();
   let res = confirm("Deseja  deletar essa atividade")
  
    if (res == true ){
      window.location.href= e.currentTarget.value;  
    }
  

            //axios.delete
  });

  $('.bAlterar').on('click', function(e) {
    
    e.preventDefault();
   
  
    
      window.location.href= e.currentTarget.value;  
    
  

            //axios.delete
  });       

  $('#cadastrarProcesso').click(function(){

  //alert ('testando evento no botão')  
    
      $.ajax({
      url:"cadastrarprocessoajax.php",
      method:"POST",
      data:$('#formProcesso').serialize(),
      dataType:"json",
      success:function(e){
         
         
         
         let modal=`<div class="content float-letf"> <div class="row"> <div class="col-md-3 ml-auto" > <div class="alert ${e[0].alert}" role="alert"> <h5 class="alert-heading">${e[0].status}</h5> <p>${e[0].mensagem}</p> <hr> </div> </div> </div> </div>`   

          $alertModal.innerHTML = modal;

      
    },
    error: function() {
             alert("Ocorreu um erro ao carregar os dados.");
           }

  });
        $(function () {

 setTimeout(function () {
            if ($(".alert").is(":visible")){
                 //you may add animate.css class for fancy fadeout
                $(".alert").fadeOut("show");
            }
        }, 3000)

});
      carregarnomeProcessoE()
      carregarnomeProcessoA()
      
      let campoprocesso =$('#nomeProcesso').val();
      
        if (campoprocesso == '' || campoprocesso == null){
            alert('nome do processo está vazio')

        }else{
          $('#nomeProcesso').val('');
          $('#observacao').val('');
          carregarnomeProcessoE()
        }    
          
  })

  
  
  let $nomeProcessoE =document.querySelector('#nomeProcessoE')

   function carregarnomeProcessoE(){
     //carregarnomeProcessoE()
     // carregarnomeProcessoA()
     $.ajax({

       method:"GET",
       url:"selecionarprocessos.php",
       success:function (resposta){

             const nomeProcessos =JSON.parse(resposta)
             let select1=''
            
             nomeProcessos.forEach(nomeProcessos=>{

                select1 +=`<option selected value="${nomeProcessos.idprocesso}">${nomeProcessos.nomeprocesso}</option>`
             })

             $nomeProcessoE.innerHTML = select1;
          }
       });
     }
  

  carregarnomeProcessoE()
  
   
$('#cadastrarEtapa').click(function(){

    carregarnomeProcessoE()
    
    $.ajax({
      url:"cadastraretapa.php",
      method:"POST",
      data:$('#formEtapa').serialize(),
      dataType:"json",
      success:function(e){
         let modal=`<div class="content float-letf"> <div class="row"> <div class="col-md-3 ml-auto" > <div class="alert ${e[0].alert}" role="alert"> <h5 class="alert-heading">${e[0].status}</h5> <p>${e[0].mensagem}</p> <hr> </div> </div> </div> </div>`   

          $alertModal.innerHTML = modal;

      
          
        },
      error: function() {
        alert("Ocorreu um erro ao carregar os dados.");
           }
    })
    
             $(function () {

 setTimeout(function () {
            if ($(".alert").is(":visible")){
                 //you may add animate.css class for fancy fadeout
                $(".alert").fadeOut("show");
            }
        }, 3000)

}); 
      let campoetapa =$('#nomeEtapa').val()
      //alert(campoetapa)
      if (campoetapa =='' ){
          alert("Campo Nome vazio")
      }else{
          $('#nomeEtapa').val('');
          $('#observacaoEtapa').val('');

      }
            
 })
  

let nomeProcessoT = document.querySelector('#nomeProcessoT')

  function carregarProcessoT(){

    $.ajax({
      type:"GET",
      url:"selecionarprocessostabela.php",
      success:function(response){
        const nomeProcesso1 = JSON.parse(response)

        let select4 = '<option class = "form-control" selected disabled> -- Selecione--</option>'

      nomeProcesso1.forEach(nomeProcesso1=>{

        select4 += `<option value="${nomeProcesso1.idprocesso}">${nomeProcesso1.nomeprocesso}</option>`
      })

        nomeProcessoT.innerHTML =select4
      }  
    })
  }
  carregarProcessoT()

  

})//final da funçao de leitura do jquery
</script>
  </body>
</html>