<?php

/**
 * Cadastra um novo usurio;
 */
	header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';
	include_once 'classes/Usuario.class.php';

	$login = strip_tags($_POST['txtlogin']);
	$nome = strip_tags(utf8_decode($_POST['txtnome']));
	$senha = strip_tags($_POST['txtsenha']);
	$nivel = strip_tags($_POST['cbo_nivel']);
	$cargo = strip_tags(utf8_decode($_POST['txtcargo']));


	$nivel;
	$cadastra = new Usuario;
	$cadastra->setUsuario($login);
	$cadastra->setNome($nome);
	$cadastra->setSenha($senha);
	$cadastra->setNivel($nivel);
	$cadastra->setCargo($cargo);

	$resp = $cadastra->Cadastra();

	if($resp ){

		$_SESSION['confirmacao'] = 1;

	}else{

		$_SESSION['confirmacao'] = 7;

	}

	header("Location:CadasUsuario.php");




?>