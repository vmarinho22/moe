<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Alunos CTI UNIVAP">
		<!--<link rel="icon" href="imagens/favicon.ico">-->
		<title>SistemaMOE</title>
		<link href="css/bootstrap.css" rel="stylesheet">
	</head>
	<body role="document">		
			<?php include 'menu.php'; ?>
            
        <div class="container" style="margin-top:50px">
  			<h1>Usuários</h1>

  			<?php 
  				require_once 'includes/Sessao.php';
  				include_once 'includes/Banco.php';
					
					$sql="SELECT idAdm,Nome,Cargo FROM adm";
					$resource = mysql_query($sql) or die(mysql_error());


					while($row=mysql_fetch_array($resource)){
						
						if($row['idAdm']!=1){
							print '<label for=""><b>Nome:&nbsp;  </b></label>'.utf8_encode($row['Nome']);
							// Verifica se não é a conta de administrador
							if($_SESSION['nivel']<=1) {
								print '&nbsp;&nbsp;&nbsp;&nbsp;<a  class="badge badge-primary" href="ExcluirUsuario.php?id='.$row['idAdm'].'">Excluir</a>';
							}

							print '<br>';
							print '<label for=""><b>Cargo:&nbsp;  </b></label>'.utf8_encode($row['Cargo']).'<br><br> ';
							
						} 
					
						
					}
					mysql_close($con);

					include 'Confirmacao.php'; 

  			?>    
		</div>
        
            
            
            
            
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
