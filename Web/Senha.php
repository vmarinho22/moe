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
  			

  			<form action="AlterarSenha.php" method="post" accept-charset="utf-8">
  			    	<h1>Alterar senha</h1>
  			    	<!-- Confirma os dados no final da operação -->
  			    	 <?php include 'Confirmacao.php'; ?>
  			    			<label for="">Senha Antiga:</label>
  			    					<input type="text" name="txtantiga" class="form-control" placeholder="Digite a senha antiga" required autofocus>
  			    			<br>
  			    			<label for="">Nova Senha:</label>
  			    					<input type="text" name="txtnova" class="form-control" placeholder="Digite a senha nova" required>
  			    			<br>		
  			    			<button class="btn btn-lg btn-primary btn-block btn-signin" id="btn_enviar" type="submit">Alterar</button>
  			    </form>	
  			
		</div>
  
            
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
