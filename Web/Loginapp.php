<?php
	include_once 'classes/Aluno.class.php';
	$server = $_POST['server'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	// print $login."\n".$senha."\n";
	
	$busca= new Aluno;
	$busca->BuscaMatriculaAluno($login);
	if($login==$busca->getMatricula() && $senha==$busca->getTurma()){
		echo 'true';
	}else{
		echo 'false';
	}
		

?>