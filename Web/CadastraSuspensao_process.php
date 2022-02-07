<?php 

header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';
	include_once 'classes/Registros.class.php';
	include_once 'classes/Aluno.class.php';

	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');


	$matricula = $_POST['txtmatricula'];
	$ata = $_POST['txtata'];
	$curso = utf8_decode($_POST['txtcurso']);
	$relato = $_POST['txtrelato'];
	$pagina = $_POST['cbo_pagina'];
	$periodo = $_POST['cbo_periodo'];
	$unidade = $_POST['cbo_unidade'];
	$horariofinal =$_POST['txthoraiofinal'];

	$data = strftime('%A, %d de %B de %Y', strtotime('today'));
	$data = mb_convert_case($data, MB_CASE_TITLE, "UTF-8");

	$hora = date('H:i');

	$usuario = $_SESSION['nomeUser'];

	$ano = strftime('de %Y', strtotime('today'));

	$dataatual = (int) date('d');
	$mesatual =ucfirst(strftime('%B', strtotime('today')));
	switch ($periodo) {
		case 2:
			 $cumpridos = "".($dataatual+1)." e ".($dataatual+2)." de ". $mesatual.$ano;
		break;

		case 3:
			$cumpridos = "".($dataatual+1).", ".($dataatual+2)." e ".($dataatual+3)." de ". $mesatual.$ano;
		break;

		case 4:
			$cumpridos = "".($dataatual+1).", ".($dataatual+2).", ".($dataatual+3)." e ".($dataatual+4)." de ". $mesatual.$ano;
		break;

		case 5:
			$cumpridos = "".($dataatual+1).", ".($dataatual+2).", ".($dataatual+3).", ".($dataatual+4)." e ".($dataatual+5)." de ". $mesatual.$ano;
		break;
				
	}

	$cumpridos = str_replace(",",".", $cumpridos);


	$cadastra = new Registro;
	$busca=new Aluno;

	$busca->BuscaMatriculaAluno($matricula);


	if(!$busca->getFlag()==0){
		$alerta =  '------------Relatorio Suspensão------------ \n';
		$alerta = $alerta.'Matricula: '.$busca->getMatricula().'\n';
		$alerta =  $alerta.'Aluno: '.$busca->getNome().'\n';
		$alerta =  $alerta.'Turma: '.$busca->getTurma().'\n';

		$alerta = $alerta.'Ata: '.$ata. '\n';
		$alerta = $alerta.'Data: '.$data. '\n';
		$alerta = $alerta.'Horario: '.$hora. '\n';
		$alerta = $alerta.'Dias a cumprir: '.$cumpridos. '\n';
		$alerta = $alerta.'Relato: '.$relato. '\n';
		$alerta = $alerta.'Usuario: '.$usuario. '\n';

		$resp = $cadastra->CadastrarSuspensao($matricula,$ata,$curso,$cumpridos,utf8_decode($relato),$pagina,$periodo,$unidade,$data,$hora,$horariofinal,$cumpridos,$usuario);

		 if($resp ){
			$_SESSION['confirmacao'] = 1;

		}else{

			$_SESSION['confirmacao'] = 4;

		}

		echo  "<script>alert('".$alerta."');javascript:window.location='CadastraSuspensao.php'</script>";

	}else{

		$_SESSION['confirmacao'] = 9;
		header("Location:CadastroSuspensao.php");
	}


?>