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


    <title>Editar Processo</title>
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
    <p class="text-center" style="color:red;"> Para editar apenas o nome do usuário deixe os dois campos de senha em branco<p>
<div class="container">
  <div class="row">
    <div class="col-md-12" id="conteudo">
        
        <div id="mensagem3" class="text-primary lg-text mt-1 mensagem"align="center"></div>      
        <form method="POST" id="formUsuarioEdit">
          <div class="form-group">
            <div class="container">
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="nomeUsuarioEd" class="col-form-label">Usuário:</label>
                  <?php 
                      
                      require_once("banco2.php");
                      require_once("banco1.php");
                      $idUsuario=$_SESSION ['idUsuario'];
                      $idUsuarioSelecionado= $_GET['id'];
                      $_SESSION['idUusarioSelecionado'] =$_GET['id'];
                      
                          
                          $sql=$db->query("SELECT * FROM usuarios WHERE id_usuario='$idUsuarioSelecionado'");
                          if($sql->rowCount()>0){
                            $y=$sql->fetch();
                              echo "<input type='text' class='form-control' id='nomeUsuarioEd' name='nomeUsuarioEd' value='".$y['usuario']."'>";
                          

                          }
                      ?>
                   
              </div>
              <div class="form-group col-md-4">
                
                <label for="senha1Ed" class="col-form-label">Nova Senha:</label>
                <input type="password" id="senha1Ed" name="senha1Ed" class='form-control'>

              </div>

              <div class="form-group col-md-4">
                
                <label for="senha2Ed" class="col-form-label">Confirmação Nova Senha:</label>
                <input type="password" id="senha2Ed" name="senha2Ed" class='form-control'>

              </div>
                           
            </div>
            </div>
            
                  


                        
                  </div>
                  <!--final container 3-->
                  
        </form>
        
        <div class="text-center mt-4">
          <button type="button" class="btn btn-warning" id="voltarUsuario" ><i class="fas fa-undo-alt"></i>&nbsp;Voltar aos Usuários</button>    
          <button type="button" class="btn btn-success" id="editarUsuario" ><i class="far fa-save"></i>&nbsp;Editar</button>  
        </div> 
                 
         
        
        
    </div>  

  </div>
  
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
            <input type="text" class="form-control" id="nomeProcesso" name="nomeProcesso" placeholder="Digite nome do processo">
          </div>
          <div class="form-group">
            <label for="obsevacao" class="col-form-label">Obsevação:</label>
            <textarea class="form-control"name="observacao" id="observacao" placeholder=""></textarea>
          </div>
        </form>
        
        
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
 // principal função do jquery

   let optionP =$('#nomeProcessoA').find(":selected").text();
    console.log (optionP)
    let optionE =$('#nomeEtapaA').find(":selected").text();
    console.log (optionE)
    let $alertModal =document.querySelector('#alertModal')
  

$(document).ready(function(){

    $('#editarUsuario').click(function(){

      console.log("opa")
    $.ajax({

      url:"editarusuarioajax.php",
      method:"POST",
      data:$('#formUsuarioEdit').serialize(),
      dataType:"JSON",
      cache: false,
      success:function(e) {
        console.log(e);
         let modal=`<div class="content float-letf"> <div class="row"> <div class="col-md-3 ml-auto" > <div class="alert ${e[0].alert}" role="alert"> <h5 class="alert-heading">${e[0].status}</h5> <p>${e[0].mensagem}</p> <hr> </div> </div> </div> </div>`   

          $alertModal.innerHTML = modal;
      },
   error: function(XMLHttpRequest, textStatus, errorThrown) {
           
           console.log(textStatus)
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
  })

 $('#voltarUsuario').click(function(){
    
    window.location.href = 'mostrarusuario.php'
    
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
      carregarnomeProcessoA()
     $.ajax({

       method:"GET",
       url:"selecionarprocessos.php",
       success:function (resposta){

             const nomeProcessos =JSON.parse(resposta)
             let select1=''
            
             nomeProcessos.forEach(nomeProcessos=>{

                select1 +=`<option selected value="${nomeProcessos.idprocesso}">${nomeProcessos.nomeprocesso}</option>`
             })

            // $nomeProcessoE.innerHTML = select1;
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



$('#cadastrarAtividade').click(function(){

     let optionP =$('#nomeProcessoA').find(":selected").text();
    console.log (optionP)
    let optionE =$('#nomeEtapaA').find(":selected").text();
    console.log (optionE)
    
    $.ajax({
      url:"cadastraratividadeajax.php",
      method:"POST",
      data:$('#formAtividade').serialize(),
      dataType:"json",
      success:function(e){

        console.log(e);
          let modal=`<div class="content float-letf"> <div class="row"> <div class="col-md-3 ml-auto" > <div class="alert ${e[0].alert}" role="alert"> <h5 class="alert-heading">${e[0].status}</h5> <p>${e[0].mensagem}</p> <hr> </div> </div> </div> </div>`   

          $alertModal.innerHTML = modal;

      
          
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

    

    

    if (cont!=0){
      let divProcesso =document.querySelector("#divProcesso")
      // let selectTextP =document.getElementById("nomeProcessoA")
      // let optionP =select.options[select.selectedIndex]
      divProcesso.innerHTML =`<h4>${optionP}</h4>`
      divEtapa.innerHTML =`<h4>${optionE}</h4>`
      
      document.getElementById("nomeProcessoA").hidden = true
      document.getElementById("nomeEtapaA").hidden = true
      document.getElementById("nomeAtividade").readOnly = true

    }else{
       document.getElementById("divProcesso").hidden =true
       document.getElementById("divEtapa").hidden =true
       document.getElementById("nomeProcessoA").hidden = false
       document.getElementById("nomeEtapaA").hidden = false
       document.getElementById("nomeAtividade").readOnly = false
       $('#nomeAtividade').val('')

    }
   
    document.getElementById("radiovalor1").checked=true
    document.getElementById("radiodinamica1").checked=true
    document.getElementById("radiosignificancia1").checked=true
    document.getElementById("radioordem1").checked=true
    document.getElementById("radioplastica1").checked=true
    document.getElementById("radiosensibilidade1").checked=true
    document.getElementById("radiosespacial1").checked=true
    document.getElementById("radiocumulatividade1").checked=true
    document.getElementById("radiocondicoes1").checked=true
    document.getElementById("radiotemporal1").checked=true
    document.getElementById("radiomagnitude1").checked=true
    document.getElementById("radioresistencia1").checked=true

      // let campoetapa =$('#nomeEtapa').val()
      // //alert(campoetapa)
      // if (campoetapa =='' ){
      //     alert("Campo Nome vazio")
      // }else{
      //     $('#nomeEtapa').val('');
      //     $('#observacaoEtapa').val('');

      // }
            
 })






  let $nomeProcessoA =document.querySelector('#nomeProcessoA')
  let $nomeEtapaA =document.querySelector('#nomeEtapaA')

   function carregarnomeProcessoA(){
     $.ajax({

       method:"GET",
       url:"selecionarprocessosetapas.php",
       success:function (resposta){

             const nomeProcessos1 =JSON.parse(resposta)
             let select2='<option class="form-control" selected disabled>-- Selecione --</option>'
            
             nomeProcessos1.forEach(nomeProcessos1=>{

                select2 +=`<option  value="${nomeProcessos1.idprocesso}">${nomeProcessos1.nomeprocesso}</option>`
             })

             //$nomeProcessoA.innerHTML = select2;
          }
       });
     }

     carregarnomeProcessoA()


    function carregarnomeEtapa(sendDatos){
          
      $.ajax({
          url:'selecionarprocessosetapas.php',
          type:'POST',
          data:sendDatos,
          success:function (resposta){
                
              const nomeEtapas =JSON.parse(resposta)
              let select3='<option class="form-control" selected disabled>-- Selecione --</option>'
                if(nomeEtapas){
                  
                }else if (!nomeEtapas){
                  console.log('erro')
                }        
                nomeEtapas.forEach(nomeEtapas=>{

                   select3 +=`<option  value="${nomeEtapas.idetapa}">${nomeEtapas.nomeetapa}</option>`
                   
                })

                $nomeEtapaA.innerHTML = select3;

              
              
           },
           error:function(resposta){
              console.log('erro');
            let select3=''
            select3+= "<option disabled> ERRo </option>"
             $nomeEtapaA.innerHTML = select3;
           }

      })

    }

  

  






})//final da funçao de leitura do jquery
</script>
  </body>
</html>