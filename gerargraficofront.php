<?php
    
    
    if(!isset($_SESSION)){
      session_start();
    }
    
     require_once("banco2.php");
    require_once("banco1.php");
    include 'testegrafico.php';
    
    
    if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario=$_SESSION ['idUsuario'];
        
    }else{

        header("Location: login.php");
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gráfico</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
         <?php
                //echo $valor00;
            
          

              for($i=0;$i<$cont;$i++){
                    $sub1=$stringMestre['subnome'][$i];
                    $sub2=$stringMestre['quantidade'][$i];
                    echo"['{$sub1} = {$sub2}',".$sub2."],";
                }
        
            
            
                                 
            
         ?>  
          
        ]);

        var options = {
          title: '<?php echo $stringMestre['nome'];
          ?>',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <button type="button" class="btn "><a href="index.php">Voltar ao inicio</a></button>
    <div id="telaGrafico">
        <div class="textoreduzido">
            <h4 class="text-center h44"><?php echo($_SESSION['telaProcesso'])?><h4> 
    </div>    
     <div id="piechart_3d" style="width: 1200px; height: 800px;"></div>

     <button type="button" class="btn "><a href="index.php">Voltar ao inicio</a></button>
</body>
</html>