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
  			<h1>Cadastro de Ocorrência</h1> 
  			<?php include 'Confirmacao.php'; ?>   
  			<form action="CadastraOcorrencia_process.php" method="post" accept-charset="utf-8">
				
				<label for="">Matricula do aluno:</label>
					<input type="text" class="form-control" name="txtmatricula" id="matricula" placeholder="Digite a matricula do aluno" required autofocus>
					<br><font color="orange">*Para visualzar o aluno basta digitar a matricula e pressionar [TAB]</font><br>
					<p id="resp"></p>
				<br>
				
				<hr>

				<label for="">Data:</label>
					<input type="date" class="form-control" name="txtData" id="txtData" required autofocus>
				<br>

				<label for="">Relato:</label>
  			    		<textarea class="form-control" name="txtrelato" placeholder="Digite o relato" required rows="5" id="comment"></textarea>
  			    <br>

  			    <label for="">Página:</label>
                  <?php include "opcaopagina.php"; ?>
                 <br>

				<label>Professor</label><br>
					<?php include 'opcaoprofessor.php'; ?>
				<br>
				
				<label>Atendimento</label><br>
					<?php include 'opcaoatendimento.php'; ?>
				<br>

				<label>Tipo Ocorrência</label><br>
					<?php include 'opcaoocorrencia.php';?>
				<br>

				<label for="">Unidade:</label>
                  <?php include "opcaounidade.php"; ?>
                  <br>

				<label>Enviar Email:</label><br>
    				<select name="enviar_email" class="form-control" required>
    					<option value="" disabled selected>Selecione uma opção</option>
     					<option value="0">Não</option>
    					<option value="1">Sim</option>
    				</select>
    			<br>
    	
    			<label>Enviar app:</label><br>
    				<select name="enviar_app" class="form-control" required>
    					<option value="" disabled selected>Selecione uma opção</option>
     					<option value="0">Não</option>
     					<option value="1">Sim</option>
    				</select>
    			<br>				


				<button class="btn btn-lg btn-primary btn-block btn-signin" id="btn_enviar" type="submit">Cadastrar</button>
                  <input type="reset" class="btn btn-lg btn-primary btn-block btn-signin" name="b2" value="Limpar"></br>

  			</form>
		</div>
        
            
            
            
            
        <script src="js/BuscaAluno.js" type="text/javascript" charset="utf-8" async defer></script>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
