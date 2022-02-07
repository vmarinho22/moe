<?php 
	header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';
	include_once 'classes/Aluno.class.php';

	if(!isset($_SESSION['matricula'])){ $matricula = $_POST['txtmatricula']; }else{ $matricula = $_SESSION['matricula']; }
	$nome = $_POST['txtnome'];
	$turma = $_POST['txtturma'];
	$responsavel1 = $_POST['txtresponsavel1'];
	$responsavel2 = $_POST['txtresponsavel2'];
	$telefone1 = $_POST['txttel1'];
	$telefone2 = $_POST['txttel2'];
	$email = $_POST['txtemail'];

	$cadastra = new Aluno;


	if(isset($_POST['btn_enviar'])){
		
		$resp = $cadastra->CadastraAluno($matricula,$nome,$turma,$responsavel1,$responsavel2,$telefone1,$telefone2,$email);

		if($resp){
			$_SESSION['confirmacao']= 1;
		}else{
			$_SESSION['confirmacao'] = 7;
		}

		header("Location: CadastraAlunos.php");

	}else{
	    
	 	$resp = $cadastra->AlteraAluno($matricula,$nome,$turma,$responsavel1,$responsavel2,$telefone1,$telefone2,$email);

		if($resp){
			$_SESSION['confirmacao']= 2;
		}else{
			$_SESSION['confirmacao'] = 8;
		}

		header("Location: Aluno.php");

	}

?>