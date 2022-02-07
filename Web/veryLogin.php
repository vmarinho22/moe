<?php
	
header('Content-Type: text/html; charset=utf-8');
require_once 'includes/Sessao.php';
include_once 'classes/Usuario.class.php';


	if(isset($_POST['txtlogin']) && isset($_POST['txtsenha'])){
		$login=strip_tags($_POST['txtlogin']);
		$senha=strip_tags($_POST['txtsenha']);

	}

		$valida= new Usuario;
		$valida->setUsuario($login);
		$valida->setSenha($senha);

		if($valida->ValidaLogin()==0){
			$_SESSION['usuario']= $valida->getUsuario();
			$_SESSION['nomeUser'] = utf8_encode($valida->getNome());
			$_SESSION['confirmacao'] = 0;
			$_SESSION['nivel'] = $valida->getNivel();
			$_SESSION['cargo'] = utf8_encode($valida->getCargo());
			header("Location: Aluno.php");
			 //print("Cargo: ".$_SESSION['cargo']);
		}else{
			$_SESSION['confirmacao'] = 5;
			header("Location:index.php");
		}
	

?>