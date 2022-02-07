<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Alunos CTI UNIVAP">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="icon" href="img/iconepag.ico">
		<title>SistemaMOE</title>
		<link href="css/bootstrap.css" rel="stylesheet">
	
	</head>
	<body role="document">		
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="img/icone.png" align="left" width="20px" />&nbspMonitoramento de Ocorrências</a>
				</div>
				
			</div>
		</nav>
            
        <div class="container">
        	<div class="card card-container">
            	<img id="profile-img" class="profile-img-card" src="img/avatar.png" />
            	<p id="profile-name" class="profile-name-card"></p>
            	<form class="form-signin" action="veryLogin.php" method="post">
                	<span id="reauth-email" class="reauth-email"></span>
                	<input type="text" id="inputEmail" class="form-control" name="txtlogin" placeholder="Login" required autofocus>
                	<input type="password" id="inputPassword" class="form-control" name="txtsenha" placeholder="Senha" required>
                
                	<button class="btn btn-lg btn-primary btn-block btn-signin" id="btn_enviar" type="submit">Entrar</button>
                	<?php include 'Confirmacao.php'; ?>
            	</form><!-- /form -->
            	<a href="#" class="forgot-password">Esqueceu a senha?</a>
        	</div><!-- /card-container -->

    	</div><!-- /container -->
        
       
            
            
            
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
