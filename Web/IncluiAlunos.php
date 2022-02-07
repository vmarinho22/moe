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
  			<h1>Incluir Alunos</h1>
			<form action="Arquivos_process.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<label class="botaoazul">Selecionar um arquivo &#187;</label>
				<input id='selecao-arquivo' name="arquivo" type='file'><br>
				<button class="btn btn-lg btn-primary btn-block btn-signin" name ="btn_enviar" id="btn_enviar" type="submit">Enviar</button>
			</form>
		</div>
          
		<!-- Bootstrap core JavaScript================================================= -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
