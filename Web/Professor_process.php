<?php 
	header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';
	include_once 'classes/Professor.class.php';

	$professor = new Professor;

	if(isset($_POST['txtprof'])){
		

		$array = $professor->BuscaProfessor($_POST['txtprof']);
		

  			$num = count($array);

  			if($num!=0){
  				print '<table class="table table-bordered">';
    			print '<tr>';
      			print '<th>Código</th>';
      			print '<th>Nome</th>';
    			print '</tr>';
  				print '<tbody>';
  				
  				for($i=0;$i<$num;$i++){
  					print $array[$i];
  				}

				print "</tbody>";
				print "</table>";

  			}else{
  				print '<font color="red">Nenhum professor com esse nome encontrado!</font>';
  			}

  	}

  	if(isset($_POST['btn_cadastra'])){
  		$nome = $_POST['txtnome'];
  		$codigo = $_POST['txtcodigo'];

  		$resp = $professor->CadastraProfessor($nome,$codigo);

  		 		if($resp){
		 	echo  "<script>alert('Professor Cadastrado com sucesso');javascript:window.location='Professor.php'</script>";	
		 }else{
		 	echo  "<script>alert('Erro ao Cadastrar Professor');javascript:window.location='Professor.php'</script>";
		 }

  	}

  	if(isset($_POST['btn_excluir'])){
  		$id = $_POST['cbo_professor'];

  		$resp = $professor->ExcluiProfessor($id);
  		if($resp){
			echo  "<script>alert('Professor excluido com sucesso');javascript:window.location='Professor.php'</script>";	
		}else{
			echo  "<script>alert('Erro ao excluir Professor');javascript:window.location='Professor.php'</script>";
		}

  	}

	
	


?>