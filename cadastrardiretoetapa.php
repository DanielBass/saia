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

      function cadastrarAtividade(){

         window.location()
      }
      
    </script>
    <title>Cadastrar Etapa</title>
  </head>
  <body id="body">
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

    <form method="POST" id="formEtapaD">
          <div class="form-group">
            <div class="container">
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="nomeProcessoD" class="col-form-label">Processo:</label>
                  <?php
                    require_once("banco2.php");
                      require_once("banco1.php");
                      $idUsuario=$_SESSION ['idUsuario'];

                      $sql=$db->query("SELECT * FROM processos  WHERE id_usuario = '$idUsuario'   ORDER BY id_processo DESC LIMIT 1");
                      if($sql->rowCount()>0){
                            $y=$sql->fetch();
                            $_SESSION['processoD'] = $y['id_processo'];
                              echo "<input type='text' class='form-control' id='nomeProcessoD' name='nomeProcessoD' value='".$y['nomeProcesso']."' readonly='readonly'>";
                          

                          }
                  ?>

                </div>
                <div class="form-group col-md-4">
                  <label for="nomeEtapaD" class="col-form-label">Etapa:</label>
                  <input type='text' class='form-control' id='nomeEtapaD' name='nomeEtapaD' placeholder="Digite o nome da nova Etapa">

                </div>
                <div class="form-group col-md-4">
                  <label for="observacaoD" class="col-form-label">Obsevação:</label>
                  <textarea  class='form-control' id='observacaoD' name='observacaoD'></textarea>
              </div>
            </div>    
          </div>
    </form>  
    <div class="text-center mt-4">
         
      <button type="button" class="btn btn-warning" id="voltarHome" ><i class="fas fa-undo-alt"></i>&nbsp;Pagina Incial</button>    
      <button type="button" class="btn btn-success" id="cadastrarEtapaD" ><i class="far fa-save"></i>&nbsp;Cadastra</button>  
    </div> 
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
        <div id="mensagem2" class="text-primary lg-text mt-1 mensagem"align="center"></div>
        
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
$(document).ready(function(){

  let NPDElemento =document.getElementById("nomeProcessoD");
      NPDElemento.style.backgroundColor = "#007bff";
      NPDElemento.style.color ="white";
 

  let $alertModal =document.querySelector('#alertModal')
  $('#voltarHome').click(function(){
    
    window.location.href = 'index.php'
    
  });

  $('#cadastrarEtapaD').click(function(){

  //alert ('testando evento no botão')  
    
    
    $.ajax({
      url:"cadastraretapadiretoajax.php",
      method:"POST",
      data:$('#formEtapaD').serialize(),
      dataType:"json",
      success:function(e){
         
         
         
         let modal=`<div class="content float-letf"> <div class="row"> <div class="col-md-3 ml-auto" > <div class="alert ${e[0].alert}" role="alert"> <h5 class="alert-heading">${e[0].status}</h5> <p>${e[0].mensagem}</p> <hr> </div> </div> </div> </div>`   

          $alertModal.innerHTML = modal;

          if(e[0].status == 'sucesso'){
            window.location.href ='cadastrardiretoatividade.php' 
          }

      
    },
    

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
      //carregarnomeProcessoA()
      
      let campoprocesso =$('#nomeEtapaD').val();
      
        if (campoprocesso == '' || campoprocesso == null){
            alert('nome do processo está vazio')

        }else{
          
          $('#nomeEtapaD').val('');
          $('#observacaoD').val('');
          carregarnomeProcessoE()
        }    
          
  })
  
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
      //carregarnomeProcessoA()
      
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
      //carregarnomeProcessoA()
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
    });

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





})//final da funçao de leitura do jquery
</script>
  </body>
</html>