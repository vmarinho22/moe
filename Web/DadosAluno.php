<?php 

	header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';
	include_once 'classes/Aluno.class.php';

	$busca=new Aluno;

	$aluno = $_GET['matricula'];

			/**
			 * Pega a matricula do aluno
			 */
			
			$busca->BuscaMatriculaAluno($aluno);

			


?>