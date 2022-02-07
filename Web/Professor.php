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
		<?php include 'menu.php'; ?>
            
        <div class="container" style="margin-top:50px">
  			<h1>Professores</h1> 

			<div class="tab">
			  <button class="tablinks" onclick="AbrirOpcao(event, 'Busca')" id="defaultOpen">Busca</button>
			  <button class="tablinks" onclick="AbrirOpcao(event, 'Cadastro')">Cadastro</button>
			  <button class="tablinks" onclick="AbrirOpcao(event, 'Exclusao')">Exclusão</button>
			</div>

			<div id="Busca" class="tabcontent">
			  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
			  <h3>Busca</h3>
			  <form action="" method="post" accept-charset="utf-8">
			  		<label for="">Nome ou código:</label>
                	<input type="text" class="form-control" name="txtprofessor" id="professor" placeholder="Digite o nome ou código do professor(a)" required autofocus>
                	<font color="orange">*Para visualzar o professor basta digitar a matricula e pressionar [TAB]</font><br>
           		</form>
				<p id="resp"></p>              
			</div>

			<div id="Cadastro" class="tabcontent">
			  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
			  <h3>Cadastro</h3>
			  <form action="Professor_process.php" method="post" accept-charset="utf-8">
			  		<label for="">Nome:</label>
                	<input type="text" class="form-control" name="txtnome" id="nome" placeholder="Digite o nome do professor(a)" required autofocus>
					<label for="">Codigo:</label>
                	<input type="text" class="form-control" name="txtcodigo" id="codigo" placeholder="Digite o código do professor(a)" required>
                	<br>
                	<button class="btn btn-lg btn-primary btn-block btn-signin" name ="btn_cadastra" id="btn_cadastra" type="submit">Cadastrar</button>
           		</form> 
			</div>

			<div id="Exclusao" class="tabcontent">
			  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
			  <h3>Exclusão</h3>
			  <label>Professor</label><br>
			  <form action="Professor_process.php" method="post" accept-charset="utf-8">
					<?php include 'opcaoprofessor.php'; ?><br>
					<button class="btn btn-lg btn-primary btn-block btn-signin" name ="btn_excluir" id="btn_excluir" type="submit">Excluir</button>
			  </form>
				<br>
			</div>

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
		<script src="js/Professor.js" type="text/javascript" charset="utf-8" async defer></script>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
