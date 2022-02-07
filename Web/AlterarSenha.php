<?php 

	header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';
	include_once 'classes/Usuario.php';


	$senhaantiga = strip_tags($_POST['txtantiga']);
	$senhanova = strip_tags($_POST['txtnova']);
	$usuario = $_SESSION['usuario'];


	$altera = new Usuario;
	$resp = $altera->AlteraSenha($senhaantiga,$senhanova,$usuario);
	
	if($resp){
		$_SESSION['confirmacao']=2;
	}else{
		$_SESSION['confirmacao']=4;
	}

	header("Location:Senha.php");










?>