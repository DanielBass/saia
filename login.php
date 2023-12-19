<?php

  include 'loginback.php';
  require_once("banco2.php");
  require_once("banco1.php");

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

    
    <title>Login</title>
  </head>
  <body id="bodylogin">

    <div class="card"  id="telalogin">
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <label for="formUsuario">Conta:</label>
            <input type="text" name="usuario"  class="form-control" id="formUsuario"  placeholder="digite sua conta" aria-describedby="emailHelp" value=<?php if (isset($usuario) && !empty($usuario)){
              echo($usuario);}else{
                  echo('');
              }?>>
            <div id="mensagem" class="text-danger lg-text mt-1"align="center"><small></small></div>
          </div>
          <div class="form-group">
            <label for="formSenha">Senha</label>
            <input type="password" name="senha" id="formSenha" class="form-control"   placeholder="digite sua senha">
            <div id="mensagemErroSenha" class="text-danger lg-text mt-1"align="center"><small></small></div>
          </div>
       <input type="submit" value="Entrar"class="btn btn-success btn-block" id="botaoLogin" onclick="bootstrapAlert()"></input>
    </form>
      </div>
  </div>
    
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!--jQuery do ajax-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


<script type="text/javascript">
  $(document).ready(function(){
      


 $('#formUsuario').blur(function(){
        

        $.ajax({
          url:"verificadorusuarioajax.php",
          method:"post",
          data:$('form').serialize(),
          dataType:"text",
          success:function(mensagem){

            $('#mensagem').text(mensagem)
            let x=$('#mensagem').text(mensagem)
            console.log(x)
          }
        })
  })

      

        

        $.ajax({
          url:"verificadorusuarioajax.php",
          method:"post",
          data:$('form').serialize(),
          dataType:"text",
          success:function(mensagem){

            $('#mensagem').text(mensagem)
            let x=$('#mensagem').text(mensagem)
            console.log(x)
          }
        })
     

       

       
    })  





    $(function () {

 setTimeout(function () {
            if ($(".alert").is(":visible")){
                 //you may add animate.css class for fancy fadeout
                $(".alert").fadeOut("show");
            }
        }, 3000)

});

</script>

  
  </body>
</html>