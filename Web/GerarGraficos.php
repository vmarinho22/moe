<?php 
                    header('Content-Type: text/html; charset=utf-8');
                    include 'includes/Banco.php';
                    include_once 'classes/Professor.class.php';
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Alunos CTI UNIVAP">
    <link rel="icon" href="img/iconepag.ico">
    <title>SistemaMOE</title>
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>
  <body role="document" >   
    <?php include 'menu.php'; ?>
            
        <div class="container" style="margin-top:50px">
        <h1>Gráficos</h1>

        <form action="" method="post" accept-charset="utf-8">
            <label>Categoria</label>
            <select name="cbo_pagina" class="form-control" id="cbo_nivel" required>
                <option value="" disabled selected>Selecione uma opção</option>
                <option value="0">Mensal</option>
                <option value="1">Professores</option>
                <option value="2">Criterios</option>
                <option value="3">Anual</option>
            </select>
            <br>
            <button class="btn btn-lg btn-primary btn-block btn-signin" name="btn_visualizar" type="submit">Visualizar</button>

        </form>   
        <br>
         <?php 
            if(isset($_POST['btn_visualizar'])){
                print '<input type="button" onclick="cont();" value="Imprimir Gráfico">';
                print '<br><br>'; 
            }
        ?>
        </div>
        
        <?php 
            if(isset($_POST['btn_visualizar'])){
              print '<center>';
              print '<div class="table-responsive">';
                print '<div id="print" class="conteudo">';      
                    echo '<div id="columnchart_values" style="width: 900px; height: 300px;"></div>';
                print '</div>';
                print '</center>';
                print '</div>';
            }
        ?>
        
        

    
                
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ["Categoria:", "Quantidade", { role: "style" } ],
                <?php

                    if(isset($_POST['btn_visualizar'])){
                       $opcao = $_POST['cbo_pagina'];

                       $meses = array('null','Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
                       $cores = array('null','LightSlateGray','DarkGreen','Brown','Maroon','DarkBlue','OrangeRed','DeepPink','DarkOrchid','Turquoise','Firebrick','Gold','Chocolate');
                       $mesatual = date('m');
                                $mesatual_int = (int)date('m');
                                $anoatual = (int)date('Y'); 
                                $resultados= array();
                       switch ($opcao) {
                           case 0:
                                
                                for($i=1;$i<=$mesatual_int;$i++){
                                    $mes = $i;
                                    $sql="SELECT count(numero_ocorrencia) FROM registro_ocorrencia WHERE MONTH(dataoco) =".$i." AND YEAR(dataoco) =". $anoatual;
                       
                                    $res= mysql_query($sql) or die(mysql_error());

                                    $resultados[$i] = mysql_result($res, 0);

                                    $data = strftime('%B', strtotime($mesatual));
                                    print "[ '$meses[$mes]', $resultados[$i], ".'"'.$cores[$i].'"'." ],"; 
                                }
                                    
                            break;

                            case 1:

                               $sql="SELECT count(registro) FROM professor";
                               $res= mysql_query($sql) or die(mysql_error());
                               $totalprof = mysql_result($res, 0);

                               $sql="SELECT * FROM professor";
                               $res= mysql_query($sql) or die(mysql_error());
                               $idsprofessores = array();
                               $i=0;

                               while($row=mysql_fetch_array($res)){
                                    $idsprofessores[$i] = $row['registro'];                                       
                                    $i++;                       
                                }

                                for($x=0;$x<$totalprof;$x++){
                              
                                   $sql="SELECT nome FROM professor WHERE registro=".$idsprofessores[$x];
                                   $res= mysql_query($sql) or die(mysql_error());

                                   while($row=mysql_fetch_array($res)){
                                        $nome = $row['nome'];                       
                                    }

                                   $sql="SELECT count(numero_ocorrencia) FROM registro_ocorrencia WHERE registro_prof=".$idsprofessores[$x]." AND YEAR(dataoco) =". $anoatual;
                                   $res= mysql_query($sql) or die(mysql_error());
                                   $quant = mysql_result($res, 0);

                                   print "[ '$nome', $quant, 'Darkblue' ],"; 

                                }
                               
                            break;

                            case 2:
                               
                               $sql="SELECT count(codigo) FROM tipo_ocorrencia";
                               $res= mysql_query($sql) or die(mysql_error());
                               $totalopcs = mysql_result($res, 0);

                               $sql="SELECT * FROM tipo_ocorrencia";
                               $res= mysql_query($sql) or die(mysql_error());
                               $idopcs = array();
                               $i=0;

                               while($row=mysql_fetch_array($res)){
                                    $idopcs[$i] = $row['codigo'];                                       
                                    $i++;                       
                                }

                                for($x=0;$x<$totalopcs;$x++){
                              
                                   $sql="SELECT t_ocorrencia FROM tipo_ocorrencia WHERE codigo=". $idopcs[$x];
                                   $res= mysql_query($sql) or die(mysql_error());

                                   while($row=mysql_fetch_array($res)){
                                        $des = $row['t_ocorrencia'];                       
                                    }

                                   $sql="SELECT count(numero_ocorrencia) FROM registro_ocorrencia WHERE codigo_tipo_ocorrencia=".$idopcs[$x]." AND YEAR(dataoco) =". $anoatual;
                                   $res= mysql_query($sql) or die(mysql_error());
                                   $quant = mysql_result($res, 0);

                                  print "[ '$des', $quant, 'Darkblue' ],"; 
                                }



                            break;

                            case 3:
                                $anoatual_int = (int)$anoatual; 

                                for($x=$anoatual_int-4;$x<=$anoatual_int;$x++){
                                    $sql="SELECT count(numero_ocorrencia) FROM registro_ocorrencia WHERE YEAR(dataoco) =". $x;
                                    $res= mysql_query($sql) or die(mysql_error());
                                    $quant = mysql_result($res, 0);
                                    print "[ '$x', $quant, 'Darkblue' ],";
                                }

                            break;
                       }


                    }

                ?>
          ]);

          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                           { calc: "stringify",
                             sourceColumn: 1,
                             type: "string",
                             role: "annotation" },
                           2]);

          var options = {
            
            title: "Quantidade das ocorrências",
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
            width: 1000,
            height: 290,
            bar: {groupWidth: "40%"},
            legend: { position: "none" },
          };
          var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
          chart.draw(view, options);
      }
    </script>

    <script>
        function cont(){
            var conteudo = '<h1><center>Gráfico</center></h1><br>' +  document.getElementById('print').innerHTML,
            tela_impressao = window.open('about:blank');
            tela_impressao.document.write(conteudo);
            tela_impressao.window.print();
            tela_impressao.window.close();
        }
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
