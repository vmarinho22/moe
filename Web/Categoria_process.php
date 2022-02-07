<?php 
	header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';
	include_once 'classes/Registros.class.php';

	$registro = new Registro;

	if(isset($_POST['btn_enviar'])){
		$descricao = $_POST['txtdescricao'];

		$resp = $registro->CadastraCategoria($descricao);

		if($resp){
			echo  "<script>alert('Cadastrado com sucesso');javascript:window.location='CategoriasOcorrencia.php'</script>";		
		}else{
			echo  "<script>alert('Erro ao cadastrar');javascript:window.location='CategoriasOcorrencia.php'</script>";
		}

	}


	if(isset($_POST['btn_deletar'])){
		$id = $_POST['cbo_tipooco'];

		$resp = $registro->DeletaCategora($id);

		if($resp){
			echo  "<script>alert('Excluído com sucesso');javascript:window.location='CategoriasOcorrencia.php'</script>";		
		}else{
			echo  "<script>alert('Erro ao excluir');javascript:window.location='CategoriasOcorrencia.php'</script>";
		}

	}





?>