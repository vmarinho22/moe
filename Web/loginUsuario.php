<?php

	require_once 'includes/Sessao.php'; print('<b>Perfil: '.$_SESSION['nomeUser'].'</b>');

	// Verifica se o usuario esta logado
	if(!isset($_SESSION['nomeUser'])){
		$_SESSION['confirmacao']=6;
		header("Location: index.php");
	}



?>