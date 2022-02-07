<?php 
	header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';
	include_once 'classes/Registros.class.php';
	include_once 'classes/Aluno.class.php';

    $falta = new Registro;

    if(isset($_POST['btn_cadastrar'])){
    	print $matricula = $_POST['txtmatricula'];
    	$horario = $_POST['cbo_horario'];

    	date_default_timezone_set('America/Sao_Paulo');
		$data = date('d-m-Y');
		
    	$resp = $falta->CadastraFalta($matricula,$data,$horario);
    	if($resp){
			echo  "<script>alert('Falta cadastrada com sucesso na matricula ".$matricula."!!!');javascript:window.location='Falta.php'</script>";
		}else{
			echo  "<script>alert('Erro no Cadastro da falta');javascript:window.location='Falta.php'</script>";
		}
    	
    }



?>