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
  			<h1>Gerenciamento de Unidades</h1> 


			<?php 

			include 'includes/Banco.php';
				require_once 'includes/Sessao.php';

			if(!isset($_GET['edita']) && !isset($_GET['exclui'])){
			print '<form action="" method="post" accept-charset="utf-8">
					<label>Unidade:</label>
					<input type="text" class="form-control" name="txtdescricao" placeholder="Digite a Unidade aqui" required autofocus>
					<label>Local:</label>
					<input type="text" class="form-control" name="txtlocal" placeholder="Digite o Endereço e cidade aqui" required >
					<br><button class="btn btn-lg btn-primary btn-block btn-signin" name ="btn_cadastrar" type="submit">Cadastrar</button>

				</form><br>';
		}

			
			
				

				print '<table class="table table-bordered">';
    			print '<tr>';
      			print '<th>Código</th>';
      			print '<th>Unidade</th>';
      			print '<th>Localização</th>';
      			print '<th>Editar</th>';
      			print '<th>Excluir</th>';
    			print '</tr>';
  				print '<tbody>';

  				$sql="SELECT * FROM unidades";
				$res= mysql_query($sql) or die(mysql_error());
		

				while($row=mysql_fetch_array($res)){
					print '<tr>';
					if(isset($_GET['edita']) && $_GET['edita']==$row['idUnidade']){
						print '<td>'.utf8_encode($row['idUnidade']).'</td>';
						print '<form action="Unidades.php" method="post" accept-charset="utf-8">';
						print '<td><input type="text" class="form-control" name="txtdescricao" value="'.utf8_encode($row['Descricao']).'" ></td>';	
						print '<td><input type="text" class="form-control" name="txtlocal" value="'.utf8_encode($row['Local']).'" ></td><br>';
						print '<input type="hidden" name="id" class="form-control" value="'.$row['idUnidade'].'">';
						print '<td><button class="btn btn-lg btn-primary btn-block btn-signin" name ="btn_editar" type="submit">Editar</button></td>';	
						print '<td><a class="badge badge-primary" href="Unidades.php">Voltar</a></td>';

						print '</form>';
					}
					if(!isset($_GET['edita']) && !isset($_GET['exclui'])){
						print '<td>'.utf8_encode($row['idUnidade']).'</td>';
						print '<td>'.utf8_encode($row['Descricao']).'</td>';
						print '<td>'.utf8_encode($row['Local']).'</td>';
						print '<td><a class="badge badge-primary" href="Unidades.php?edita='.$row['idUnidade'].'">Editar</a></td>';
						print '<td><a class="badge badge-primary" href="Unidades.php?exclui='.$row['idUnidade'].'">Excluir</a></td>';			
					}	
					print '</tr>';		
         		}

         		 if(isset($_POST['btn_editar'])){
         		 	$id = $_POST['id'];
         		 	$unidade = utf8_decode($_POST['txtdescricao']);
         		 	$local = utf8_decode($_POST['txtlocal']);

         		 	$sql="UPDATE unidades SET Descricao='$unidade',Local='$local' WHERE idUnidade=$id";
					$res= mysql_query($sql) or die(mysql_error());

					echo  "<script>alert('Editado com sucesso');javascript:window.location='Unidades.php'</script>";

         		 }

         		 if(isset($_GET['exclui'])){
         		 	$id = $_GET['exclui'];
         		 	
         		 	$sql="DELETE From unidades WHERE idUnidade=$id";
					$res= mysql_query($sql) or die(mysql_error());

					echo  "<script>alert('Excluido com sucesso');javascript:window.location='Unidades.php'</script>";

         		 }

         		 if(isset($_POST['btn_cadastrar'])){
         		 	$unidade = utf8_decode($_POST['txtdescricao']);
         		 	$local = utf8_decode($_POST['txtlocal']);

         		 	$sql="INSERT INTO unidades(Descricao,Local) VALUES ('$unidade','$local')";
					$res= mysql_query($sql) or die(mysql_error());

					echo  "<script>alert('Cadastro com sucesso');javascript:window.location='Unidades.php'</script>";

         		 }

         
	


  				print "</tbody>";
				print "</table>";
			?>
			

			</form>
		</div>
        
                        
            
            
		<!-- Bootstrap core JavaScript================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
