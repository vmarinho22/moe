<?php 
	header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';
	include_once 'classes/Registros.class.php';
	include_once 'classes/Aluno.class.php';


	 $matricula = $_POST['txtmatricula'];
	 $data = $_POST['txtData'];
	 $relato = $_POST['txtrelato'];
	 $professor = $_POST['cbo_professor'];
	 $pagina = $_POST['cbo_pagina'];
	 $atendimento = $_POST['cbo_atendimento'];
	 $tipo_ocorrencia = $_POST['cbo_tipooco'];
	 $envia_email = $_POST['enviar_email'];
	 $envia_app = $_POST['enviar_app'];
	 $usuario = $_SESSION['nomeUser'];
	 $unidade = $_POST['cbo_unidade'];


	 $cadastra = new Registro;
	 $busca=new Aluno;


	$busca->BuscaMatriculaAluno($matricula);


	if(!$busca->getFlag()==0){

		$alerta =  '------------Relatorio------------ \n';
		$alerta = $alerta.'Matricula: '.$busca->getMatricula().'\n';
		$alerta =  $alerta.'Aluno: '.$busca->getNome().'\n';
		$alerta =  $alerta.'Turma: '.$busca->getTurma().'\n';

		$alerta = $alerta.'Data: '.$data. '\n';
		$alerta = $alerta.'Relato: '.$relato. '\n';
		$alerta = $alerta.'Usuario: '.$usuario. '\n';

		


		$resp = $cadastra->CadastraOcorrencia($matricula,$data,$relato,$professor,$atendimento,$tipo_ocorrencia,$envia_email,$envia_app,$usuario,$pagina,$unidade);


		 if($resp){
			$_SESSION['confirmacao'] = 1;

		}else{

			$_SESSION['confirmacao'] = 4;

		}

		echo  "<script>alert('".$alerta."');javascript:window.location='CadastroOcorrencia.php'</script>";

	}else{

		$_SESSION['confirmacao'] = 9;
		header("Location:CadastroOcorrencia.php");
	}

	


?>