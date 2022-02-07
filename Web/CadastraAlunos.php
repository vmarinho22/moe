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

				<h1><?php if(!isset($_GET['matricula'])){ print '<h1>Cadastro de Aluno</h1>'; }else{ print '<h1>Alteração do Aluno</h1>'; } ?></h1><br>

				<h4><font color="orange">Campos com (*) são obrigatorios</font></h4>
  			    <br>

  			<form action="CadastraAlunos_process.php" method="post" accept-charset="utf-8">
  			    	
  			    	 <?php include 'Confirmacao.php'; ?>
  			    	 		
                  <?php include 'DadosAluno.php'; ?>
  			    	 		

  			    			<label for="">Matricula:<font color="orange"> *</font></label>
  			    					<input type="text" name="txtmatricula" class="form-control"  value="<?php
                      if(isset($_GET['matricula'])){ echo $busca->getMatricula(); $_SESSION['matricula']=$busca->getMatricula(); } ?> " <?php if(isset($_GET['matricula'])) { echo 'disabled'; }else{ echo 'required autofocus';} ?> >
  			    			<br>
  			    			
  			    			<label for="">Nome:<font color="orange"> *</font></label>
  			    					<input type="text" name="txtnome" class="form-control" value="<?php
                      if(isset($_GET['matricula'])){ echo $busca->getNome();} ?>"  required>
  			    			<br>

  			    			<label for="">Turma:<font color="orange"> *</font></label>
  			    					<input type="text" name="txtturma" class="form-control" value="<?php
                      if(isset($_GET['matricula'])){ echo $busca->getTurma();} ?>" required>
  			    			<br>

  			    			<label for="">Responsavel1:<font color="orange"> *</font></label>
  			    					<input type="text" name="txtresponsavel1" class="form-control" value="<?php
                      if(isset($_GET['matricula'])){ echo $busca->getResponsavel1();} ?>"  required>
  			    			<br>

  			    			<label for="">Responsavel2:</label>
  			    					<input type="text" name="txtresponsavel2" class="form-control" value="<?php
                      if(isset($_GET['matricula'])){ echo $busca->getResponsavel2();} ?>" >
  			    			<br>

  			    			<label for="">Telefone1:<font color="orange"> *</font></label>
  			    					<input type="text" name="txttel1" class="form-control" value="<?php
                      if(isset($_GET['matricula'])){ echo $busca->getTelefone1();} ?>" required>
  			    			<br>

  			    			<label for="">Telefone2:</label>
  			    					<input type="text" name="txttel2" class="form-control" value="<?php
                      if(isset($_GET['matricula'])){ echo $busca->getTelefone2();} ?>" >
  			    			<br>

  			    			<label for="">Email:<font color="orange"> *</font></label>
  			    					<input type="text" name="txtemail" class="form-control" value="<?php
                      if(isset($_GET['matricula'])){ echo $busca->getEmail();} ?>" required>
  			    			<br>


  			    			<button class="btn btn-lg btn-primary btn-block btn-signin" id=" <?php if(!isset($_GET['matricula'])){ echo 'btn_enviar';}else{ echo 'btn_alterar';} ?>" type="submit"><?php if(!isset($_GET['matricula'])){ 
                  echo 'Cadastrar'; }else{ echo 'Alterar'; } ?></button>
                  <?php if(!isset($_GET['matricula'])){
                          print '<input type="reset" class="btn btn-lg btn-primary btn-block btn-signin" name="b2" value="Limpar">';
                    }
                  ?>

  			    </form>
  			    <br>	
		</div>
        
            
            
            
            
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
