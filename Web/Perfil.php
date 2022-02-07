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
	<?php include 'menu.php'; ?>
            
        <div class="container" style="margin-top:50px; width: 80%; @media (max-width: 960px){ .container{ width: 100%;} }">
  			<h1>Perfil - Informações</h1>
  			<?php include 'InfoPerfil.php'; ?> <br>
  			<h3>Opções</h3>
  			<a href="Senha.php" class="badge badge-primary">Trocar senha</a> 
		</div>
  
            
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
