<?php 
	header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';

	$_SESSION['matricula'] = $_GET['matricula'];
	header("Location:Aluno.php");

?>