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
  <body role="document">    
    <?php include 'menu.php'; ?>

    
            
        <div class="container" style="margin-top:50px; width: 80%; @media (max-width: 960px){ .container{ width: 100%;} }">

          <!-- Formulario de busca do aluno  -->
        <form action="" method="post" accept-charset="utf-8">
              <h1>Visualizar Advertências</h1><br>
              <?php include 'Confirmacao.php'; ?>
                  <label for="">Matricula do Aluno:</label>
                      <div style="position: relative;">
                      <div style="margin: 0 110px 0 0;">
                      <input type="text" name="txtaluno" id="matricula" class="form-control" placeholder="Digite a Matricula do Aluno" required autofocus>
                      </div>
                      <div style="position: absolute; right: 0; top: 0; width: 10%; height: 100%">
                      <a href="Ocorrencia.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Limpar</a>
                      </div>
                      </div>

                      <br><font color="orange">*Para visualzar o aluno basta digitar a matricula e pressionar [TAB]</font><br>
                      <p id="resp"></p>

                      <button class="btn btn-lg btn-primary btn-block btn-signin" name ="btn_enviar" id="btn_enviar" type="submit">Visualizar</button>
                  <br>

                  
                  
        </form>   
        <!-- Fim do formulario de busca de aluno -->
        <br>

        <?php 
        if(isset($_POST['btn_enviar'])){
              print ' <label>Opções de Impressão</label> ';
              print '<form action="Imprimir.php" method="post" target="_blank"> ';
              print '  <div style="width: 85%; float: left;">';
              print '    <input type="hidden" name="txtmatricula" value="'.$_POST['txtaluno'].'">';
              print '    <select name="opcaoimprimir" class="form-control" required>';
              print '      <option value="" disabled selected>Selecione uma opção</option>';
              print '      <option value="0">Todos os registros</option>';
              print '      <option value="1">Apenas Ocorrências(sem app)</option>';
              print '      <option value="2">Apenas Suspensões(sem app)</option>';
              print '    </select>';
              print '  </div>';
              print ' <div style="width: 5%; float: left; ">';
              print '    <button class="btn btn-primary" name ="btn_imprimir" id="btn_imprimir" type="submit">Imprimir</button>';
              print ' </div>';
              print '</form>';
             print ' </div> ';
        }
         ?>

        <div class="container" style="margin-top:50px; width: 80%; @media (max-width: 960px){ .container{ width: 100%;} }">
       
        <?php include 'Ocorrencia_process.php';  ?>


      </div>
                 
            
            
    <script src="js/BuscaAluno.js" type="text/javascript" charset="utf-8" async defer></script>       
    <!-- Bootstrap core JavaScript================================================== -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
