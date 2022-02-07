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
		<link href="css/Tab.css" rel="stylesheet">
	</head>
	<body role="document" >		
		<?php include 'menu.php'; include_once 'includes/Sessao.php'; ?>
            
        <div class="container" style="margin-top:50px">
  			<h1>Gerenciamento de Faltas</h1>    
			
			<div class="tab">
			  <button class="tablinks" onclick="AbrirOpcao(event, 'Cadastro')" id="defaultOpen">Busca</button>
			  <?php if($_SESSION['nivel']<=2){ print '<button class="tablinks" onclick="AbrirOpcao(event, '."'Exclusao'".')">Exclusão</button>'; } ?>
			</div>

			
			<div id="Cadastro" class="tabcontent">
				<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
				<h3>Cadastro</h3>
				<form action="Falta_Process.php" method="post" accept-charset="utf-8">  			    	
  			    	<label for="">Matricula do aluno:</label>
                	<input type="text" class="form-control" name="txtmatricula" id="matricula" placeholder="Digite a matricula do aluno" required autofocus><br>
                	<label for="">Periodo</label>
                	<select name="cbo_horario" class="form-control" id="cbo_nivel" required>
						<option value="" disabled selected>Selecione uma opção</option>
						<option value="0" >Manhã</option>
						<option value="1" >Tarde</option>
                	</select>
                	<br><font color="orange">*Para visualzar o aluno basta digitar a matricula e pressionar [TAB]</font><br>
               		<p id="resp"></p>
              		<br>
  			    	<button class="btn btn-lg btn-primary btn-block btn-signin" name ="btn_cadastrar" id="btn_cadastrar" type="submit">Cadastrar Falta</button>
  			</form>   

			</div>

			<?php if($_SESSION['nivel']<=2){
				include 'includes/Banco.php';
					print '<div id="Exclusao" class="tabcontent">';
					print '<span onclick="this.parentElement.style.display='."'none'".'" class="topright">&times</span>';
					print '<h3>Exclusao</h3>';
					print '<form action="" method="post" accept-charset="utf-8">  			    	
  			    	<label for="">Matricula do aluno:</label>
                	<input type="text" class="form-control" name="txtmatricula" id="matricula" placeholder="Digite a matricula do aluno" required autofocus><br>              
                	<br><font color="orange">*Para visualzar o aluno basta digitar a matricula e pressionar [TAB]</font><br>
               		<p id="resp"></p>
              		<br>
              		';
              		if(!isset($_POST['btn_excluir'])){
              		print '
  			    	<button class="btn btn-lg btn-primary btn-block btn-signin" name ="btn_excluir" id="btn_excluir" type="submit">Excluir Falta</button>
  			    	</form>';
  			    	}

  			    	if(isset($_POST['btn_excluir'])){
  			    		
  			    		print '<table class="table table-bordered">';
  			    		print '<tr>';
      					print '<th>Data </th>';
      					print '<th>Horaio</th>';
      					print '<th></th>';
      					print '</tr>';
  						print '<tbody>';

  						$sql = "SELECT * FROM faltas WHERE matricula=".$_POST['txtmatricula'];
  						$res= mysql_query($sql) or die(mysql_error());

				        while($row=mysql_fetch_array($res)){
				            print '<tr>';
							print '<td>'.str_replace("-","/",$row['data']).'</td>';
							print '<td>';
							if($row['horario']==0){
								print 'Manhã';
							}else{
								print 'Tarde';
							}
							print '</td>';
							print '<td><a href="Falta.php?exclui='.$row['idfaltas'].'" class="badge badge-primary">Excluir</a></td>';				     
				            print '</tr>';
				        }

  						print "</tbody>";
						print "</table>";

  			    	}

  			    	if(isset($_GET['exclui'])){

  			    		$id = $_GET['exclui'];

  			    		$sql="DELETE FROM faltas WHERE idfaltas=".$id;
				        $resource = mysql_query($sql) or die(mysql_error());
				        
				        if(mysql_affected_rows()>0){
				            header('Location:Falta.php');
				        }else{
				            header('Location:Falta.php');
				        } 
  			    	}


					print '</div>';
				  }

			?>



		</div>
        
            
            
            
        <script>
			function AbrirOpcao(evt, opcao) {
			    var i, tabcontent, tablinks;
			    tabcontent = document.getElementsByClassName("tabcontent");
			    for (i = 0; i < tabcontent.length; i++) {
			        tabcontent[i].style.display = "none";
			    }
			    tablinks = document.getElementsByClassName("tablinks");
			    for (i = 0; i < tablinks.length; i++) {
			        tablinks[i].className = tablinks[i].className.replace(" active", "");
			    }
			    document.getElementById(opcao).style.display = "block";
			    evt.currentTarget.className += " active";
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
		</script>  
		 <script src="js/BuscaAluno.js" type="text/javascript" charset="utf-8" async defer></script>  
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
