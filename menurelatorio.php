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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script >

      function cadastrarAtividade(){

         window.location()
      }
      
    </script>
    <title>HOME</title>
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

           

            <li>
              <a class="nav-link  dropdown-item " data-toggle="modal" data-target="#modalRelatorio01" data-whatever="@pro" href="">Relário 01</a>
            </li>
            <li>
              <a class="nav-link  dropdown-item " data-toggle="modal" data-target="#modalGrafico" data-whatever="@pro" href="">Gráfico</a>
            </li>

            <li>
              <a class="nav-link  dropdown-item " data-toggle="modal" data-target="#modalAnaliseGrafica" data-whatever="@pro" href="">Analise Gráfica</a>
            </li>

            <li>
              <a class="nav-link  dropdown-item " data-toggle="modal" data-target="#modalCriticidade" data-whatever="@pro" href="">Criticidade</a>
            </li>

          </ul>
          
        </div>
      </div>
    </nav>
 

<!--  modal de analise grafica-->
<div class="modal fade" id="modalAnaliseGrafica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Analise Gráfica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="relatorioanalisegraficaback.php" method="POST" id="formAnaliseGrafica">
          <div class="form-group">
            <label for="nomeProcessoA" class="col-form-label">Selecione o processo:</label>
            <select name="nomeProcessoA" id="nomeProcessoA" class="form-control input-lg" data-live-search="true"> </select>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="far fa-times-circle"></i>&nbsp;Sair</button>
        <button type="submit" class="btn btn-success" id="gerarAnalise" ><i class="far fa-save"></i>&nbsp;Cadastrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fim modal de analise grafica-->    
<!--modal grafico-->
<div class="modal fade" id="modalGrafico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informação parar Gerar o grafico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="gerargraficofront.php" method="POST" id="formGrafico">
          <div class="form-group">
            <label for="nomeProcessoG" class="col-form-label">Selecione o processo:</label>
            <select name="nomeProcessoG" id="nomeProcessoG" class="form-control input-lg" data-live-search="true"> </select>
          </div>
          <div class="form-group col-12">
            <label for="boxItem" class="col-form-label">Escolha os critério em quer montar o gráfico</label>
            <h6 class="text-center"> (No máximo, Três itens)</h6>
                    
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="valor" id='valor'> Valor
                      </label>      
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="ordem" id='ordem'> Ordem
                      </label>    
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="espacial" id='espacial'> Espacial
                      </label>    
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="temporal" id='temporal'> Temporal
                      </label>      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="dinamica" id='dinamica'> Dinâmica
                      </label>    
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="plastica" id='plastica'> Plástica
                      </label>      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="cumulatividade" id='cumulatividade'> Cumulatividade
                      </label>      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="magnitude" id='magnitude'> Magnitude
                      </label>      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="significancia" id='significancia'> Significância
                      </label>      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="sensibilidade" id='sensibilidade'> Sensibilidade
                      </label>      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="condicoes" id='condicoes'> Condições
                      </label>      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label>
                        <input type="checkbox" class="limited" name="item[]" value="resistencia" id='resistencia'> Resistência
                      </label>      
                    </div>
                  </div> 

                  <div class="modal-footer">
                    <button  type="submit" class="btn btn-success" id="gerarGrafico" ><i class="fas fa-chart-pie"></i>&nbsp;Gera Gráfico</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="far fa-times-circle"></i>&nbsp;Sair</button>
                  </div>

        </div>             
        </form>

        <div id="mensagem1" class="text-primary lg-text mt-1 mensagem"align="center"></div>
        
      </div>
       
    </div>
  </div>
</div>
<!-- fim modal grafico-->


<!--modal relatorio 01-->
<div class="modal fade" id="modalRelatorio01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informação parar Gerar o grafico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formGrafico">
          <div class="form-group">
            <label for="" class="col-form-label">Selecione o processo:</label>
            <select name="" id="nomeProcessoR" class="form-control input-lg" data-live-search="true"> </select>
          </div>
          <div class="form-group" >
              <label for="numero" class="col-form-label">selecione os itens que deseja gerar o relatório</label>
              <select name="numero" id="numero" class="form-control input-lg">

                <option class="form-control"  selected disabled>-- Selecione --</option>
                <option class="form-control"  value="1">1</option>
                <option class="form-control"  value="2">2</option>
                <option class="form-control"  value="3">3</option>
              </select>
          </div>    
          
          <div class="form-group" id="divSelect01">
              <label for="Select01" class="col-form-label">item 01</label>
              <select name="Select01" id="Select01" class="form-control input-lg">

                <option class="form-control"  selected disabled>-- Selecione --</option>
                <option class="form-control"  value="P">Valor-Positivo</option>
                <option class="form-control"  value="N">Valor-Negativo</option>
                <option class="form-control"  value="T">Dinâmica-Temporário cíclico</option>
                <option class="form-control"  value="C">Dinâmica-Cíclico</option>
                <option class="form-control"  value="P">Dinâmica-Permanente</option>
                <option class="form-control"  value="P">Significância-Pequena</option>
                <option class="form-control"  value="M">Significância-Média</option>
                <option class="form-control"  value="G">Significância-Grande</option>
                <option class="form-control"  value="D">Ordem-Direto</option>
                <option class="form-control"  value="I">Ordem-Indireto</option>
                <option class="form-control"  value="R">Plástica-Reservível</option>
                <option class="form-control"  value="I">Plástica-Irreversível</option>
                <option class="form-control"  value="B">Sensibilidade-Baixa</option>
                <option class="form-control"  value="M">Sensibilidade-Média</option>
                <option class="form-control"  value="A">Sensibilidade-Alta</option>
                <option class="form-control"  value="P">Epacial-Local</option>
                <option class="form-control"  value="R">Epacial-Regional</option>
                <option class="form-control"  value="E">Epacial-Estratégico</option>
                <option class="form-control"  value="P">Cumulatividade-Presente</option>
                <option class="form-control"  value="A">Cumulatividade-Ausente</option>
                <option class="form-control"  value="N">Condições-Normais</option>
                <option class="form-control"  value="A">Condições-Anormais</option>
                <option class="form-control"  value="C">Temporal-Curto Prazo</option>
                <option class="form-control"  value="M">Temporal-Médio Prazo</option>
                <option class="form-control"  value="L">Temporal-Longo Prazo</option>
                <option class="form-control"  value="F">Magnitude-Fraco</option>
                <option class="form-control"  value="M">Magnitude-Médio</option>
                <option class="form-control"  value="O">Magnitude-Forte</option>
                <option class="form-control"  value="L">Resistência-Irredutível</option>
                <option class="form-control"  value="L">Resistência-Mitigável</option>
                <option class="form-control"  value="L">Resistência-Eliminável</option>
              </select>
          </div>
          <div class="form-group" id="divSelect02">
              <label for="Select02" class="col-form-label">item 02</label>
              <select name="Select02" id="Select02" class="form-control input-lg">

                <option class="form-control"  selected disabled>-- Selecione --</option>
                <option class="form-control"  value="P">Valor-Positivo</option>
                <option class="form-control"  value="N">Valor-Negativo</option>
                <option class="form-control"  value="T">Dinâmica-Temporário cíclico</option>
                <option class="form-control"  value="C">Dinâmica-Cíclico</option>
                <option class="form-control"  value="P">Dinâmica-Permanente</option>
                <option class="form-control"  value="P">Significância-Pequena</option>
                <option class="form-control"  value="M">Significância-Média</option>
                <option class="form-control"  value="G">Significância-Grande</option>
                <option class="form-control"  value="D">Ordem-Direto</option>
                <option class="form-control"  value="I">Ordem-Indireto</option>
                <option class="form-control"  value="R">Plástica-Reservível</option>
                <option class="form-control"  value="I">Plástica-Irreversível</option>
                <option class="form-control"  value="B">Sensibilidade-Baixa</option>
                <option class="form-control"  value="M">Sensibilidade-Média</option>
                <option class="form-control"  value="A">Sensibilidade-Alta</option>
                <option class="form-control"  value="P">Epacial-Local</option>
                <option class="form-control"  value="R">Epacial-Regional</option>
                <option class="form-control"  value="E">Epacial-Estratégico</option>
                <option class="form-control"  value="P">Cumulatividade-Presente</option>
                <option class="form-control"  value="A">Cumulatividade-Ausente</option>
                <option class="form-control"  value="N">Condições-Normais</option>
                <option class="form-control"  value="A">Condições-Anormais</option>
                <option class="form-control"  value="C">Temporal-Curto Prazo</option>
                <option class="form-control"  value="M">Temporal-Médio Prazo</option>
                <option class="form-control"  value="L">Temporal-Longo Prazo</option>
                <option class="form-control"  value="F">Magnitude-Fraco</option>
                <option class="form-control"  value="M">Magnitude-Médio</option>
                <option class="form-control"  value="O">Magnitude-Forte</option>
                <option class="form-control"  value="L">Resistência-Irredutível</option>
                <option class="form-control"  value="L">Resistência-Mitigável</option>
                <option class="form-control"  value="L">Resistência-Eliminável</option>
              </select>
          </div>
          <div class="form-group" id="divSelect03">
              <label for="Select03" class="col-form-label">item 03</label>
              <select name="Select03" id="Select03" class="form-control input-lg">

                <option class="form-control"  selected disabled>-- Selecione --</option>
                <option class="form-control"  value="P">Valor-Positivo</option>
                <option class="form-control"  value="N">Valor-Negativo</option>
                <option class="form-control"  value="T">Dinâmica-Temporário cíclico</option>
                <option class="form-control"  value="C">Dinâmica-Cíclico</option>
                <option class="form-control"  value="P">Dinâmica-Permanente</option>
                <option class="form-control"  value="P">Significância-Pequena</option>
                <option class="form-control"  value="M">Significância-Média</option>
                <option class="form-control"  value="G">Significância-Grande</option>
                <option class="form-control"  value="D">Ordem-Direto</option>
                <option class="form-control"  value="I">Ordem-Indireto</option>
                <option class="form-control"  value="R">Plástica-Reservível</option>
                <option class="form-control"  value="I">Plástica-Irreversível</option>
                <option class="form-control"  value="B">Sensibilidade-Baixa</option>
                <option class="form-control"  value="M">Sensibilidade-Média</option>
                <option class="form-control"  value="A">Sensibilidade-Alta</option>
                <option class="form-control"  value="P">Epacial-Local</option>
                <option class="form-control"  value="R">Epacial-Regional</option>
                <option class="form-control"  value="E">Epacial-Estratégico</option>
                <option class="form-control"  value="P">Cumulatividade-Presente</option>
                <option class="form-control"  value="A">Cumulatividade-Ausente</option>
                <option class="form-control"  value="N">Condições-Normais</option>
                <option class="form-control"  value="A">Condições-Anormais</option>
                <option class="form-control"  value="C">Temporal-Curto Prazo</option>
                <option class="form-control"  value="M">Temporal-Médio Prazo</option>
                <option class="form-control"  value="L">Temporal-Longo Prazo</option>
                <option class="form-control"  value="F">Magnitude-Fraco</option>
                <option class="form-control"  value="M">Magnitude-Médio</option>
                <option class="form-control"  value="O">Magnitude-Forte</option>
                <option class="form-control"  value="L">Resistência-Irredutível</option>
                <option class="form-control"  value="L">Resistência-Mitigável</option>
                <option class="form-control"  value="L">Resistência-Eliminável</option>
              </select>
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
<!-- fim modal Grafico-->
<!--  modal de Criticidade-->
<div class="modal fade" id="modalCriticidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Analise Gráfica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="criticidadeback.php" method="POST" id="formCriticidade">
          <div class="form-group">
            <label for="nomeProcessoC" class="col-form-label">Selecione o processo:</label>
            <select name="nomeProcessoC" id="nomeProcessoC" class="form-control input-lg" data-live-search="true"> </select>
          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="far fa-times-circle"></i>&nbsp;Sair</button>
        <button type="submit" class="btn btn-success" id="gerarAnalise" ><i class="far fa-save"></i>&nbsp;Cadastrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fim modal Criticidade-->






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
  $('#gerarGrafico').prop("disabled", true);



 $('.limited').on('click', function() {
    //seletor para os checkbox com name item selecionados
    var checkbox = $('input:checkbox[name^=item]:checked');
    let check = document.getElementsByName("item[]")
    let cont=10
    //verifica se existem checkbox selecionados
    if(checkbox.length >= 0){
        //array para armazenar os valores
        
        var val = [];
        
        
        //função each para pegar os selecionados
        checkbox.each(function(){
            val.push($(this).val());
        });
        //exibe no console o array com os valores selecionados
         
        
         if ($('.limited').is(':checked') == true){
           $('#gerarGrafico').prop("disabled", false);
         }else{
           $('#gerarGrafico').prop("disabled", true);
         }
        
        if (val.length > 3){
          //$('.limited').prop('disabled', 'disabled');
          this.checked = false;
          
        }
    } 
});

 
//fim das novas funçoes parte 2/////////
  let $alertModal =document.querySelector('#alertModal')
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
  let $nomeProcessoG =document.querySelector('#nomeProcessoG')
  let $nomeProcessoA =document.querySelector('#nomeProcessoA')
  let $nomeProcessoC =document.querySelector('#nomeProcessoC')
  let $nomeProcessoR = document.querySelector('#nomeProcessoR')

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
             $nomeProcessoG.innerHTML = select1;
             $nomeProcessoA.innerHTML = select1;
             $nomeProcessoC.innerHTML = select1;
             $nomeProcessoR.innerHTML = select1;
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