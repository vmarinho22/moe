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
  			    	<h1>Aluno</h1><br>
  			    	<?php include 'Confirmacao.php'; ?>
  			    			<label for="">Busca de Aluno(s):</label>
  			    					<input type="text" name="txtaluno" class="form-control" placeholder="Digite a Matricula ou Nome do Aluno" required autofocus>
  			    			<br><br>

  			    			<button class="btn btn-lg btn-primary btn-block btn-signin" name ="btn_enviar" id="btn_enviar" type="submit">Buscar</button>
  			    			


  			</form>   
  			<!-- Fim do formulario de busca de aluno -->
  			<br>

  			<?php include 'Aluno_processs.php';  ?>


		</div>
                 
            
            
            
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
