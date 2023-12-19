<?php
    
    
    if(!isset($_SESSION)){
      session_start();
    }
    
     require_once("banco2.php");
    require_once("banco1.php");
    $_SESSION['chaveCE'] = false ;
    
    
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
    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">


    <title>Cadastrar atividade</title>
    <style type="text/css"> 
      
     
      
     

     
    </style>
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
<div class="container">
  <div class="row">
    <div class="col-md-12" id="conteudo">
        
        <div id="mensagem3" class="text-primary lg-text mt-1 mensagem"align="center"></div>      
        <form   method="POST" enctype="multipart/form-data" name="formAtividade" id="formAtividade">
          <div class="form-group">
            <div class="container">
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="nomeProcessoA" class="col-form-label">Selecione o processo:</label>
                  <div id="divProcesso"></div>
                  <select name="nomeProcessoA" id="nomeProcessoA" class="form-control input-lg" data-live-search="true"> </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="nomeEtapaA" class="col-form-label">Selecione a Etapa:</label>
                  <div id="divEtapa"></div>
                  <select name="nomeEtapaA" id="nomeEtapaA" class="form-control input-lg" data-live-search="true"> </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="nomeAtividade" class="col-form-label">Atividade:</label>
                   <input type="text" class="form-control" id="nomeAtividade" name="nomeAtividade" placeholder="Digite nome da Etapa">
              </div>
              <div class="form-group col-md-3">
                <label for="item" class="col-form-label">Item:</label>
                <input type="text" class="form-control" id="item" name="item"  readonly="readonly">
              </div>

              <div class="form-group col-md-4">
                  <label for="obsevacao" class="col-form-label">Obsevação:</label>
                  <textarea class="form-control"name="observacao" id="observacaoItem" placeholder=""></textarea>
                </div>
              <div class="form-group col-md-3">
                 <label for="imagemItem" class="col-form-label">Imagen:</label>
                 <input type="file" name="imagemItem" id="imagemItem" class="form-control">
              </div>
              <div class="form-group col-md-2">
                <label for="modalInformativo" class="col-form-label" >Informação:</label>
                <button type="button" id="modalInformativo"class="btn btn-success" data-toggle="modal" data-target="#infor01"><i class="fa-solid fa-info"></i>&nbsp;click Para infor</button>
                <!-- Modal -->
                  <div class="modal fade" id="infor01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Informações sobre os atributos que serão preenchidos</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p class="text-center"><strong>Valor:</strong></p>
                          <p> Verifica se a atividade impactante é benéfica ou maléfica. Pode ser qualificada como “Positivo”, quando a atividade causa melhoria da qualidade de uma condição ou “Negativo”, quando causa dano.<p>

                          <p class="text-center"><strong>Ordem:</strong></p>
                          <p> Avalia se o impacto causado é efeito de uma atividade impactante ou decorrente de algum elemento secundário dessa atividade. Pode ser classificado como “Direto” quando o impacto é uma relação simples de causa e efeito, ou “Indireto” quando o impacto é proveniente de uma ação derivada a partir da atividade.<p>

                          <p class="text-center"><strong>Espacial:</strong></p>
                          <p> Indica a abrangência de área do impacto. Classificada como “Local”, quando a área afetada está nas imediações ou na mesma propriedade de onde ocorreu a atividade impactante. “Regional”, quando o impacto afeta áreas que vão além das imediações da área onde a atividade é realizada ou ainda “Estratégico”, quando o projeto afeta a coletividade, podendo ter abrangência nacional ou até mesmo internacional.<p>

                          <p class="text-center"><strong>Temporal:</strong></p>
                          <p> Trata do tempo decorrido entre a realização da atividade impactante e da manifestação dos efeitos analisados. Pode ser “Curto prazo”, quando o efeito surge em um pequeno espaço de tempo, a ser definido de acordo com o tipo de projeto. “Médio prazo”, quando o tempo de manifestação é mediano em relação ao tipo de projeto ou “longo prazo”, quando o tempo para os efeitos se manifestarem é grande em relação ao tipo de projeto.<p>

                          <p class="text-center"><strong>Dinâmica:</strong></p>
                          <p> Diz respeito à duração de tempo em que os efeitos do impacto serão sentidos. Pode ser “Temporário”, quando os impactos são sentidos por um tempo determinado. “Cíclico”, quando os impactos são sentidos em determinados períodos de tempo ou épocas do ano e “Permanente” quando os efeitos do impacto não param de se manifestar em um período de tempo aceitável pela sociedade.<p>

                          <p class="text-center"><strong>Plástica:</strong></p>
                          <p> Faz referência se quando a atividade impactante terminar, os impactos terminam junto com ela. Pode ser “Reversível”, quando o meio ambiente volta ao seu estado anterior, pouco tempo após o fim da execução das atividades impactantes ou “Irreversível”, quando o meio ambiente não retorna ao seu estado anterior após um período de tempo aceitável pela sociedade.<p>

                          <p class="text-center"><strong>Cumulatividade:</strong></p>
                          <p> Que analisa se existe alguma interação entre os impactos gerados pelas atividades impactantes do projeto, podendo até englobar outros projetos. Pode ser “Presente”, quando o impacto é influenciado e/ou influencia outros impactos ou “Ausente”, quando o impacto não sofre nem gera qualquer efeito em outros impactos.<p>

                          <p class="text-center"><strong>Magnitude:</strong></p>
                          <p> Analisa a força do impacto. Pode ser “Forte”, quando for um grande impacto em termos absolutos, ou seja, existe uma grande alteração em uma condição ambiental em termos quantitativos e qualitativos. “Média”, quando o impacto é mediano em termos absolutos ou “Fraca”, quando o impacto é baixo em termos absolutos<p>

                          <p class="text-center"><strong>Significância:</strong></p>
                          <p> Trata da relação de percepção da comunidade em relação à importância do impacto causado. Pode ser “Grande” quando existe uma grande sensibilidade popular das comunidades afetadas. “Média”, quando essa sensibilidade é mediana ou “Pequena” se essa sensibilidade é pouca ou nenhuma.<p>

                          <p class="text-center"><strong>Sensibilidade:</strong></p>
                          <p> Diz respeito à sensibilidade do meio ambiente, conforme as diretrizes do diagnóstico ambiental, da área de influência do impacto. Pode ser “Alta” quando existir uma grande sensibilidade, “Média”, quando existir uma sensibilidade mediana do meio ambiente ou “Baixa”, quando a sensibilidade for baixa ou não existir.<p>

                          <p class="text-center"><strong>Condições:</strong></p>
                          <p> Faz uma relação direta entre a atividade impactante e o impacto gerado por ela. Pode ser “Normal”, quando o impacto acontece em condições normais, ou seja, sempre que a atividade impactante acontecer, o impacto também acontece ou “Anormais”, quando o impacto gerado só ocorre em condições específicas, juntamente com a atividade impactante, como por exemplo, ocorrência de chuvas, ou outro fator climático.<p>

                          <p class="text-center"><strong>Resistência:</strong></p>
                          <p> Analisa se medidas preventivas ou corretivas podem ser tomadas para neutralizar ou minimizar os efeitos do impacto. Pode ser: “Irredutível”, quando as medidas não influenciarão o impacto. “Mitigável”, quando as medidas puderem diminuir/contornar os efeitos do impacto gerado ou “Eliminável”, quando as medidas reverterem completamente o impacto ambiental causado pela atividade impactante.<p>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>
              </div> 
              <div id="divImgBanco" class="form-group col-md-3">
                 <img src="" heigth="200" width="100" id="imagemBanco"/>
              </div>

            </div>
            </div>
            
                  <div class="container">
                    <div class="row  mt-5">
                       <div class="col-md-3 mb-3">
                          <label><h5>Valor:</h5></label><br>
                          <div class="row">
                            <div class="col-md-12">
                                <input type="radio" id="radiovalor1"  name="radiovalor" value='Z' CHECKED>
                                <label for="radiovalor1">Não aplicável</label>   
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <input type="radio" id="radiovalor2" name="radiovalor" value="P">
                                <label for="radiovalor2">Positivo</label>   
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <input type="radio" id="radiovalor3" name="radiovalor" value="N">
                                <label for="radiovalor3">Negativo</label>   
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3 mb-3">
                          <label><h5>Ordem:</h5></label><br>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioordem1" name="radioordem" value="Z" CHECKED>
                                <label for="radioordem1">Não aplicável</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioordem2" name="radioordem" value="D">
                                <label for="radioordem2">Direto</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioordem3" name="radioordem" value="I">
                                <label for="radioordem3">Indireto</label>   
                              </div>
                            </div>
                        </div>

                         <div class="col-md-3 mb-3">
                          <label><h5>Espacial:</h5></label><br>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioespacial1" name="radioespacial" value="Z" CHECKED>
                                <label for="radioespacial1">Não aplicável</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioespacial2" name="radioespacial" value="L">
                                <label for="radioespacial2">Local</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioespacial3" name="radioespacial" value="R">
                                <label for="radioespacial3">Regional</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioespacial4" name="radioespacial" value="E">
                                <label for="radioespacial4">Estratégico</label>   
                              </div>
                            </div>

                        </div>

                        <div class="col-md-3 mb-3">
                          <label><h5>Temporal:</h5></label><br>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiotemporal1" name="radiotemporal" value="Z" checked>
                                <label for="radiotemporal1">Não aplicável</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiotemporal2" name="radiotemporal" value="C">
                                <label for="radiotemporal2">Curto Prazo</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiotemporal3" name="radiotemporal" value="M">
                                <label for="radiotemporal3">Médio Prazo</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiotemporal4" name="radiotemporal" value="L">
                                <label for="radiotemporal4">Longo Prazo</label>   
                              </div>
                            </div>

                           
                        </div>
                  </div>
                  <!--final container 1-->
                  <div class="container">
                    <div class="row">
                      
                      <div class="col-md-3 mb-3">
                          <label><h5>Dinâmica:</h5></label><br>
                          <div class="row">
                            <div class="col-md-12">
                                <input type="radio"  id="radiodinamica1" name="radiodinamica" value="Z" CHECKED>
                                <label for="radiodinamica1">Não aplicável</label>   
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <input type="radio" id="radiodinamica2" name="radiodinamica" value="T">
                                <label for="radiodinamica2">Temporário cíclico</label>   
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <input type="radio" id="radiodinamica3" name="radiodinamica" value="C">
                                <label for="radiodinamica3">Cíclico</label>   
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <input type="radio" id="radiodinamica4" name="radiodinamica" value="P">
                                <label for="radiodinamica4">Permanente</label>   
                            </div>
                          </div>

                           
                        </div> 

                        <div class="col-md-3 mb-3">
                          <label><h5>Plástica:</h5></label><br>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioplastica1" name="radioplastica" value="Z" CHECKED>
                                <label for="radioplastica1">Não aplicável</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioplastica2" name="radioplastica" value="R">
                                <label for="radioplastica2">Reversível</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioplastica3" name="radioplastica" value="I">
                                <label for="radioplastica3">Irreversível</label>   
                              </div>
                            </div>

                           
                        </div>

                        <div class="col-md-3 mb-3">
                          <label><h5>Cumulatividade:</h5></label><br>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiocumulatividade1" name="radiocumulatividade" value="Z" CHECKED>
                                <label for="radiocumulatividade1">Não aplicável</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiocumulatividade2" name="radiocumulatividade" value="P">
                                <label for="radiocumulatividade2">Presente</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiocumulatividade3" name="radiocumulatividade" value="A">
                                <label for="radiocumulatividade3">Ausente</label>   
                              </div>
                            </div>

                           
                        </div>

                        <div class="col-md-3 mb-3">
                          <label><h5>Magnitude:</h5></label><br>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiomagnitude1" name="radiomagnitude" value="Z" checked>
                                <label for="radiomagnitude1">Não aplicável</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiomagnitude2" name="radiomagnitude" value="F" >
                                <label for="radiomagnitude2">Fraco</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiomagnitude3" name="radiomagnitude" value="M" >
                                <label for="radiomagnitude3">Médio</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiomagnitude4" name="radiomagnitude" value="O" >
                                <label for="radiomagnitude4">Forte</label>   
                              </div>
                            </div>
                            

                           
                        </div>

                        
                  </div>
                  <!--final container 2-->
                  <div class="container">
                    <div class="row">
                      
                      <div class="col-md-3 mb-3">
                          <label><h5>Significância:</h5></label><br>
                           <div class="row">
                            <div class="col-md-12">
                                <input type="radio" id="radiosignificancia1" name="radiosignificancia" value="Z" CHECKED>
                                <label for="radiosignificancia1">Não aplicável</label>   
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <input type="radio" id="radiosignificancia2" name="radiosignificancia" value="P">
                                <label for="radiosignificancia2">Pequena</label>   
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <input type="radio" id="radiosignificancia3" name="radiosignificancia" value="M">
                                <label for="radiosignificancia3">Média</label>   
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <input type="radio" id="radiosignificancia4" name="radiosignificancia" value="G">
                                <label for="radiosignificancia4">Grande</label>   
                            </div>
                          </div>

                           
                        </div>

                        <div class="col-md-3 mb-3">
                          <label><h5>Sensibilidade:</h5></label><br>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiosensibilidade1" name="radiosensibilidade" value="Z" CHECKED>
                                <label for="radiosensibilidade1">Não aplicável</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiosensibilidade2" name="radiosensibilidade" value="B">
                                <label for="radiosensibilidade2">Baixa</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiosensibilidade3" name="radiosensibilidade" value="M">
                                <label for="radiosensibilidade3">Média</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiosensibilidade4" name="radiosensibilidade" value="A">
                                <label for="radiosensibilidade4">Alta</label>   
                              </div>
                            </div>

                           
                        </div>

                        <div class="col-md-3 mb-3">
                          <label><h5>Condições:</h5></label><br>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiocondicoes1" name="radiocondicoes" value="Z" CHECKED>
                                <label for="radiocondicoes1">Não aplicável</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiocondicoes2" name="radiocondicoes" value="N">
                                <label for="radiocondicoes2">Normais</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radiocondicoes3" name="radiocondicoes" value="A">
                                <label for="radiocondicoes3">Anormais</label>   
                              </div>
                            </div>

                           
                        </div>

                        <div class="col-md-3 mb-3">
                          <label><h5>Resistência:</h5></label><br>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioresistencia1" name="radioresistencia" value="Z" checked>
                                <label for="radioresistencia1">Não aplicável</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioresistencia2" name="radioresistencia" value="I">
                                <label for="radioresistencia2">Irredutível</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioresistencia3" name="radioresistencia" value="M">
                                <label for="radioresistencia3">Mitigável</label>   
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <input type="radio" id="radioresistencia4" name="radioresistencia" value="E">
                                <label for="radioresistencia4">Eliminável</label>   
                              </div>
                            </div>

                           
                        </div>



                        
                  </div>
                  <!--final container 3-->
                  
        
        
        
                 
              
          
         <div class="text-center mt-4">
          <button type="button" class="btn btn-warning" id="voltarAtividade" ><i class="fa-solid fa-backward"></i> &nbsp;Voltar</button> 
          <button type="button" class="btn btn-dark" ><i class="far fa-times-circle"></i>&nbsp;Sair</button>    
          <input  type="submit" class="btn btn-success" id="cadastrarAtividade" >  
        </div>
        </form>  
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
  
    let optionP =$('#nomeProcessoA').find(":selected").text();
    console.log (optionP)
    let optionE =$('#nomeEtapaA').find(":selected").text();
    console.log (optionE)
    let $alertModal =document.querySelector('#alertModal')
 

$(document).ready(function(){ 

  
  let itens=new Array();
        let cont = 0;
        itens[0]='Particulas sólidas'
        itens[1]='Gases e vapores'
        itens[2]='Contaminação da água'
        itens[3]='Contaminação do solo'
        itens[4]='Redução da diversidade'
        itens[5]='Economia Local'
        itens[6]='Infraestrutura'
        itens[7]='Tecnologia'
        itens[8]='Qualidade de vida'
        itens[9]='Saúde'
        itens[10]='Desenvolvimento Regional'
        itens[11]='Paisagimos'
        itens[12]='Qualidade do Produto Final'

  

  
      document.getElementById("voltarAtividade").disabled = true

       let IElemento =document.getElementById("item");
      IElemento.style.backgroundColor = "#007bff";
      IElemento.style.color ="white";
 
        
  $('#voltarAtividade').click(function(){
    
    cont--;
    document.getElementById("item").value=itens[cont]

    if (document.getElementById("item").value == itens[0] ){
      document.getElementById("voltarAtividade").disabled = true
    }else{
      document.getElementById("voltarAtividade").disabled = false
    } 
  
    $.ajax({
        url:"selecionarradioajax2.php",
        method:"POST",
        data:$('#formAtividade').serialize(),
        dataType:"text",
        success:function(r){
          const teste =JSON.parse(r)
          console.log(teste)
          if (JSON.stringify(teste) ==='[]'){
            $("#observacaoItem").val("") 
            $("#imagemBanco").attr("src", "");
            $("#divImgBanco").hide();
            $("#radiovalor1").prop("checked", true);
            $("#radiodinamica1").prop("checked", true);
            $("#radiosignificancia1").prop("checked", true);
            $("#radioordem1").prop("checked", true);
            $("#radioplastica1").prop("checked", true);
            $("#radiosensibilidade1").prop("checked", true);
            $("#radioespacial1").prop("checked", true);
            $("#radiocumulatividade1").prop("checked", true);
            $("#radiocondicoes1").prop("checked", true);
            $("#radiotemporal1").prop("checked", true);
            $("#radiomagnitude1").prop("checked", true);
            $("#radioresistencia1").prop("checked", true);



          }
          teste.forEach(teste=>{
            
            let letra =teste.iniciais
            let imagem =teste.imagem
            let obs =teste.obs
            let upload ="upload/"

            $("#observacaoItem").val(obs)

            if (imagem == ""){
              
              $("#imagemBanco").attr("src", "");
               $("#divImgBanco").hide();


            }else{
              
              $("#imagemBanco").attr("src", upload+imagem);
              $("#divImgBanco").show();

            }

            switch(letra.charAt(1)){
              case 'Z':
                $("#radiovalor1").prop("checked", true);
                
              break;
              case 'P':
              $("#radiovalor2").prop("checked", true);
                
              break;
              case 'N':
              $("#radiovalor3").prop("checked", true);
                
              break;

              default: 
                $("#radiovalor1").prop("checked", true);
            }
            switch(letra.charAt(5)){
              case 'Z':
                $("#radiodinamica1").prop("checked", true);
              break;

              case 'T':
              $("#radiodinamica2").prop("checked", true);
              break;

              case 'C':
              $("#radiodinamica3").prop("checked", true);
              break;

              case 'P':
              $("#radiodinamica4").prop("checked", true);
              break;

              default: 
                $("#radiodinamica1").prop("checked", true);
            }
            switch(letra.charAt(9)){
              case 'Z':
                $("#radiosignificancia1").prop("checked", true);
              break;

              case 'P':
              $("#radiosignificancia2").prop("checked", true);
              break;

              case 'M':
              $("#radiosignificancia3").prop("checked", true);
              break;

              case 'G':
              $("#radiosignificancia4").prop("checked", true);
              break;

              default: 
                $("#radiosignificancia1").prop("checked", true);
            }
            switch(letra.charAt(2)){
              case 'Z':
                $("#radioordem1").prop("checked", true);
              break;

              case 'D':
              $("#radioordem2").prop("checked", true);
              break;

              case 'I':
              $("#radioordem3").prop("checked", true);
              break;

              default: 
                $("#radioordem1").prop("checked", true);
            }
            switch(letra.charAt(6)){
              case 'Z':
                $("#radioplastica1").prop("checked", true);
              break;

              case 'R':
              $("#radioplastica2").prop("checked", true);
              break;

              case 'I':
              $("#radioplastica3").prop("checked", true);
              break;

              default: 
                $("#radioplastica1").prop("checked", true);
            }
            switch(letra.charAt(10)){
              case 'Z':
                $("#radiosensibilidade1").prop("checked", true);
              break;

              case 'B':
                $("#radiosensibilidade2").prop("checked", true);
              break;

              case 'M':
                $("#radiosensibilidade3").prop("checked", true);
              break;
              case 'A':
                $("#radiosensibilidade4").prop("checked", true);
              break;

              default: 
                $("#radiosensibilidade1").prop("checked", true);
            }
            switch(letra.charAt(3)){
              case 'Z':
                $("#radioespacial1").prop("checked", true);
              break;

              case 'L':
                $("#radioespacial2").prop("checked", true);
              break;

              case 'R':
                $("#radioespacial3").prop("checked", true);
              break;
              case 'E':
                $("#radioespacial4").prop("checked", true);
              break;

              default: 
                $("#radioespacial1").prop("checked", true);
            }
            switch(letra.charAt(7)){
              case 'Z':
                $("#radiocumulatividade1").prop("checked", true);
              break;

              case 'P':
                $("#radiocumulatividade2").prop("checked", true);
              break;

              case 'A':
                $("#radiocumulatividade3").prop("checked", true);
              break;

              default: 
                $("#radiocumulatividade1").prop("checked", true);
              }

              switch(letra.charAt(11)){
              case 'Z':
                $("#radiocondicoes1").prop("checked", true);
              break;

              case 'N':
                $("#radiocondicoes2").prop("checked", true);
              break;

              case 'A':
                $("#radiocondicoes3").prop("checked", true);
              break;
              }
              switch(letra.charAt(4)){
              case 'Z':
                $("#radiotemporal1").prop("checked", true);
              break;

              case 'C':
                $("#radiotemporal2").prop("checked", true);
              break;

              case 'M':
                $("#radiotemporal3").prop("checked", true);
              break;

              case 'L':
                $("#radiotemporal4").prop("checked", true);
              break;

              default: 
                $("#radiotemporal1").prop("checked", true);
              }
              switch(letra.charAt(8)){
              case 'Z':
                $("#radiomagnitude1").prop("checked", true);
              break;

              case 'F':
                $("#radiomagnitude2").prop("checked", true);
              break;

              case 'M':
                $("#radiomagnitude3").prop("checked", true);
              break;

              case 'O':
                $("#radiomagnitude4").prop("checked", true);
              break;

              default: 
                $("#radiomagnitude1").prop("checked", true);
              }

              switch(letra.charAt(12)){
              case 'Z':
                $("#radioresistencia1").prop("checked", true);
              break;

              case 'I':
                $("#radioresistencia2").prop("checked", true);
              break;

              case 'M':
                $("#radioresistencia3").prop("checked", true);
              break;

              case 'E':
                $("#radioresistencia4").prop("checked", true);
              break;

              default: 
                $("#radioresistencia1").prop("checked", true);
              }
            
            
          })
        }
    })



  
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


cont=0
let resposta = '0'
document.getElementById("item").value=itens[cont]
$("#formAtividade").on("submit",function(x){
    
    
    let optionP =$('#nomeProcessoA').find(":selected").text();
    console.log (optionP)

    let optionE =$('#nomeEtapaA').find(":selected").text();
    console.log (optionE)

   

       

    x.preventDefault();
    let form_data =new FormData(this);

      document.getElementById("item").value=itens[cont+1]
     $.ajax({
        url:"selecionarradioajax2.php",
        method:"POST",
        data:$('#formAtividade').serialize(),
        dataType:"text",
        success:function(r){
          const teste =JSON.parse(r)
          console.log(teste)
          if (JSON.stringify(teste) ==='[]'){
            $("#observacaoItem").val("") 
            $("#imagemBanco").attr("src", "");
            $("#divImgBanco").hide();
            $("#radiovalor1").prop("checked", true);
            $("#radiodinamica1").prop("checked", true);
            $("#radiosignificancia1").prop("checked", true);
            $("#radioordem1").prop("checked", true);
            $("#radioplastica1").prop("checked", true);
            $("#radiosensibilidade1").prop("checked", true);
            $("#radioespacial1").prop("checked", true);
            $("#radiocumulatividade1").prop("checked", true);
            $("#radiocondicoes1").prop("checked", true);
            $("#radiotemporal1").prop("checked", true);
            $("#radiomagnitude1").prop("checked", true);
            $("#radioresistencia1").prop("checked", true);



          }
          teste.forEach(teste=>{
            
            let letra =teste.iniciais
            let imagem =teste.imagem
            let obs =teste.obs
            let upload ="upload/"

            $("#observacaoItem").val(obs)

            if (imagem == ""){
              
              $("#imagemBanco").attr("src", "");
               $("#divImgBanco").hide();


            }else{
              
              $("#imagemBanco").attr("src", upload+imagem);
              $("#divImgBanco").show();

            }

            switch(letra.charAt(1)){
              case 'Z':
                $("#radiovalor1").prop("checked", true);
                
              break;
              case 'P':
              $("#radiovalor2").prop("checked", true);
                
              break;
              case 'N':
              $("#radiovalor3").prop("checked", true);
                
              break;

              default: 
                $("#radiovalor1").prop("checked", true);
            }
            switch(letra.charAt(5)){
              case 'Z':
                $("#radiodinamica1").prop("checked", true);
              break;

              case 'T':
              $("#radiodinamica2").prop("checked", true);
              break;

              case 'C':
              $("#radiodinamica3").prop("checked", true);
              break;

              case 'P':
              $("#radiodinamica4").prop("checked", true);
              break;

              default: 
                $("#radiodinamica1").prop("checked", true);
            }
            switch(letra.charAt(9)){
              case 'Z':
                $("#radiosignificancia1").prop("checked", true);
              break;

              case 'P':
              $("#radiosignificancia2").prop("checked", true);
              break;

              case 'M':
              $("#radiosignificancia3").prop("checked", true);
              break;

              case 'G':
              $("#radiosignificancia4").prop("checked", true);
              break;

              default: 
                $("#radiosignificancia1").prop("checked", true);
            }
            switch(letra.charAt(2)){
              case 'Z':
                $("#radioordem1").prop("checked", true);
              break;

              case 'D':
              $("#radioordem2").prop("checked", true);
              break;

              case 'I':
              $("#radioordem3").prop("checked", true);
              break;

              default: 
                $("#radioordem1").prop("checked", true);
            }
            switch(letra.charAt(6)){
              case 'Z':
                $("#radioplastica1").prop("checked", true);
              break;

              case 'R':
              $("#radioplastica2").prop("checked", true);
              break;

              case 'I':
              $("#radioplastica3").prop("checked", true);
              break;

              default: 
                $("#radioplastica1").prop("checked", true);
            }
            switch(letra.charAt(10)){
              case 'Z':
                $("#radiosensibilidade1").prop("checked", true);
              break;

              case 'B':
                $("#radiosensibilidade2").prop("checked", true);
              break;

              case 'M':
                $("#radiosensibilidade3").prop("checked", true);
              break;
              case 'A':
                $("#radiosensibilidade4").prop("checked", true);
              break;

              default: 
                $("#radiosensibilidade1").prop("checked", true);
            }
            switch(letra.charAt(3)){
              case 'Z':
                $("#radioespacial1").prop("checked", true);
              break;

              case 'L':
                $("#radioespacial2").prop("checked", true);
              break;

              case 'R':
                $("#radioespacial3").prop("checked", true);
              break;
              case 'E':
                $("#radioespacial4").prop("checked", true);
              break;

              default: 
                $("#radioespacial1").prop("checked", true);
            }
            switch(letra.charAt(7)){
              case 'Z':
                $("#radiocumulatividade1").prop("checked", true);
              break;

              case 'P':
                $("#radiocumulatividade2").prop("checked", true);
              break;

              case 'A':
                $("#radiocumulatividade3").prop("checked", true);
              break;

              default: 
                $("#radiocumulatividade1").prop("checked", true);
              }

              switch(letra.charAt(11)){
              case 'Z':
                $("#radiocondicoes1").prop("checked", true);
              break;

              case 'N':
                $("#radiocondicoes2").prop("checked", true);
              break;

              case 'A':
                $("#radiocondicoes3").prop("checked", true);
              break;
              }
              switch(letra.charAt(4)){
              case 'Z':
                $("#radiotemporal1").prop("checked", true);
              break;

              case 'C':
                $("#radiotemporal2").prop("checked", true);
              break;

              case 'M':
                $("#radiotemporal3").prop("checked", true);
              break;

              case 'L':
                $("#radiotemporal4").prop("checked", true);
              break;

              default: 
                $("#radiotemporal1").prop("checked", true);
              }
              switch(letra.charAt(8)){
              case 'Z':
                $("#radiomagnitude1").prop("checked", true);
              break;

              case 'F':
                $("#radiomagnitude2").prop("checked", true);
              break;

              case 'M':
                $("#radiomagnitude3").prop("checked", true);
              break;

              case 'O':
                $("#radiomagnitude4").prop("checked", true);
              break;

              default: 
                $("#radiomagnitude1").prop("checked", true);
              }

              switch(letra.charAt(12)){
              case 'Z':
                $("#radioresistencia1").prop("checked", true);
              break;

              case 'I':
                $("#radioresistencia2").prop("checked", true);
              break;

              case 'M':
                $("#radioresistencia3").prop("checked", true);
              break;

              case 'E':
                $("#radioresistencia4").prop("checked", true);
              break;

              default: 
                $("#radioresistencia1").prop("checked", true);
              }
            
            
          })
        }
    })

    $.ajax({

      url:"cadastraratividadeajax.php",
      method:"POST",
      data:form_data,
      dataType:"JSON",
      processData:false,
      contentType:false,
      success:function(e){

        console.log(e);
          let modal=`<div class="content float-letf"> <div class="row"> <div class="col-md-3 ml-auto" > <div class="alert ${e[0].alert}" role="alert"> <h5 class="alert-heading">${e[0].status}</h5> <p>${e[0].mensagem}</p> <hr> </div> </div> </div> </div>`   
              if (e[0].res == '1'){
              
                alert('já existe uma atividade com esse nome');
                if(e[0].res =='1'){
                  window.location.href='cadastroatividade.php'
                }
              }
          $alertModal.innerHTML = modal;
            

      
          
        }

      
    });


        

    
      

      $('#observacaoItem').val('');
      $('#imagemItem').val('');

      console.log(resposta);

    

            $(function () {

              setTimeout(function () {
                  if ($(".alert").is(":visible")){
                  //you may add animate.css class for fancy fadeout
                  $(".alert").fadeOut("show");
                  }
              }, 3000)

            });

    let campoatividade =$('#nomeAtividade').val()
      
       if (campoatividade =='' ){
           alert("Campo Nome vazio")
       }else{
      if (cont>=12){
      
        cont=0
        document.getElementById("item").value=itens[cont]

        if (document.getElementById("item").value == itens[0] ){
          document.getElementById("voltarAtividade").disabled = true

        }else{
          document.getElementById("voltarAtividade").disabled = false
        }

    }else{
      
      cont++
      document.getElementById("item").value=itens[cont]

        if (document.getElementById("item").value == itens[0] ){
          document.getElementById("voltarAtividade").disabled = true

        }else{
          document.getElementById("voltarAtividade").disabled = false
        }


    }

    if (cont!=0){
      let divProcesso =document.querySelector("#divProcesso")
      // let selectTextP =document.getElementById("nomeProcessoA")
      // let optionP =select.options[select.selectedIndex]
      divProcesso.innerHTML =`<h4>${optionP}</h4>`
      divEtapa.innerHTML =`<h4>${optionE}</h4>`
      
      document.getElementById("nomeProcessoA").hidden = true
      document.getElementById("nomeEtapaA").hidden = true
      document.getElementById("nomeAtividade").readOnly = true
      
      let NAElemento =document.getElementById("nomeAtividade");
      let IElemento =document.getElementById("item");
      NAElemento.style.backgroundColor = "#007bff";
      NAElemento.style.color ="white";
      IElemento.style.backgroundColor = "#007bff";
      IElemento.style.color ="white";
      

    }else{
       document.getElementById("divProcesso").hidden =true
       document.getElementById("divEtapa").hidden =true
       document.getElementById("nomeProcessoA").hidden = false
       document.getElementById("nomeEtapaA").hidden = false
       document.getElementById("nomeAtividade").readOnly = false
       $('#nomeAtividade').val('')
       let NAElemento =document.getElementById("nomeAtividade");
       NAElemento.style.backgroundColor = "white";
       NAElemento.style.color ="black";
     
    }
   
    document.getElementById("radiovalor1").checked=true
    document.getElementById("radiodinamica1").checked=true
    document.getElementById("radiosignificancia1").checked=true
    document.getElementById("radioordem1").checked=true
    document.getElementById("radioplastica1").checked=true
    document.getElementById("radiosensibilidade1").checked=true
    document.getElementById("radioespacial1").checked=true
    document.getElementById("radiocumulatividade1").checked=true
    document.getElementById("radiocondicoes1").checked=true
    document.getElementById("radiotemporal1").checked=true
    document.getElementById("radiomagnitude1").checked=true
    document.getElementById("radioresistencia1").checked=true
    
       }

    
       
            
 })


    $("#formImagem").on("submit",function(e){
        alert("Deus sabe de tudo")
        e.preventDefault();
        let form_data =new FormData(this);
        alert("entrei")
        $.ajax({

          
          url:"testeimagemajax.php",
          method:"POST",
          data: form_data,
          dataType:"JSON",
          processData:false,
          contentType:false,
          success:function(data){
            $("h1").text(data.output);
          }
        });
    });



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

             $nomeProcessoA.innerHTML = select2;
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

  

  

$nomeProcessoA.addEventListener('change',function(){
    
     const codProcesso =$nomeProcessoA.value
       
         
      const sendDatos ={
        'idprocesso': codProcesso
      }
       
      carregarnomeEtapa(sendDatos)      
   })





})//final da funçao de leitura do jquery
</script>
  </body>
</html>