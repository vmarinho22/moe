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
  			<h1>Edição de Páginas</h1>    

  			<?php

  			header('Content-Type: text/html; charset=utf-8');
			require_once 'includes/Sessao.php';
			include_once 'classes/Registros.class.php';

			$paginas = new Registro;

  			print 'Atuamente existem: <b>'.$paginas->ContaPaginas().'</b> páginas.<br>';


  			?>

			<form action="" method="post" accept-charset="utf-8">
  			    <label for="">Nova Quantidade:</label>
  			    <input type="text" name="txtquantidade" class="form-control" placeholder="Digite a quantidade de páginas" required autofocus>
  			    <br>

  			   <button class="btn btn-lg btn-primary btn-block btn-signin" name ="btn_enviar" id="btn_enviar" type="submit">Editar</button>
  
  			</form> 

  			<?php 

  				include 'includes/Banco.php';
  				
  				if(isset($_POST['txtquantidade'])){

	  				$quantidade = $_POST['txtquantidade'];

	  				$sql="TRUNCATE paginas";
		        	
		        	$res= mysql_query($sql) or die(mysql_error());

		        	$sql="ALTER TABLE paginas auto_increment=1";
		        	
		        	$res= mysql_query($sql) or die(mysql_error());
	  				
	  				for($i=1;$i<=$quantidade;$i++){
		  				$sql="INSERT INTO paginas(pagina) VALUES ($i)";
		        		$array = array();
		        		$res= mysql_query($sql) or die(mysql_error());
	        		}

	        		header("Location:EditaPaginas.php");
				}

  			?>  

		</div>
        
            
            
            
            
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
