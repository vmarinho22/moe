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
  			    <form action="CadasUsuario_process.php" method="post" accept-charset="utf-8">
  			    	<h1>Cadastros de Usuários</h1><br>
  			    	 <?php include 'Confirmacao.php'; ?>
  			    			<label for="">Login:</label>
  			    					<input type="text" name="txtlogin" class="form-control" placeholder="Digite um login de usuário" required autofocus>
  			    			<br>
  			    			<label for="">Nome:</label>
  			    					<input type="text" name="txtnome" class="form-control" placeholder="Digite o Nome" required>
  			    			<br>
  			    				<label for="">Senha:</label>
  			    					<input type="text" name="txtsenha" class="form-control" placeholder="Digite a senha" required>
  			    			<br>

  			    			<label for="">Cargo:</label>
  			    					<input type="text" name="txtcargo" class="form-control" placeholder="Digite o Cargo" required>
  			    			<br>

  			    			<?php include 'Nivel.php'; ?>

  			    			<button class="btn btn-lg btn-primary btn-block btn-signin" id="btn_enviar" type="submit">Cadastrar</button>
                  <input type="reset" class="btn btn-lg btn-primary btn-block btn-signin" name="b2" value="Limpar">
  			    </form>	
  			   
		</div>
        
            
            
            
            
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
