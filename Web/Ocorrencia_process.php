<?php 

/**
 * 
 */
	require_once 'includes/Sessao.php';
	include_once 'classes/Registros.class.php';
	include_once 'classes/Aluno.class.php';

	$busca = new Registro;
	$aluno = new Aluno;

	if(isset($_POST['btn_enviar'])){

		$matricula = $_POST['txtaluno'];
		
		
		$controle = $busca->getIdOcorrencias($matricula);
		
		$result = count($controle);
		

		$aluno->BuscaMatriculaAluno($matricula);
				
		print '<label>Ocorrências</label>';
		print '<br>';

		if($result!=0 && !$aluno->getFlag()==0){
					
					print '<div class="table-responsive">';
					print '<table class="table table-bordered">';
    				print '<tr>';
      						print '<th>Tipo</th>';
      						print '<th>Data</th>';
      						print '<th>Relato</th>';
      						print '<th>Professor</th>';
      						print '<th>Atendimento</th>';
      						print '<th>Efetuado por:</th>';
      						print '<th>Página:</th>';
      						print '<th>Impressão</th>';
    				print '</tr>';
  					print '<tbody>';


  					$array = $busca->BuscaOcorrencias($matricula);
  					for($i=0;$i<$result;$i++){	
  						print $array[$i];
  					}


  					print "</tbody>";
					print "</table>";
					print "</div>";
		}else{
			print 'Nenhuma Ocorrência constada.';
		}

		print '<br>';
		print '<br>';

		print '<label>Suspensões</label>';
		print '<br>';


		$controle2 = $busca->getIdSuspensoes($matricula);
		$result2 = count($controle2);

		if(!$aluno->getFlag()==0 && $result2!=0){

			print '<div class="table-responsive">';
					print '<table class="table table-bordered">';
    				print '<tr>';
      						print '<th>Ata Nº</th>';
      						print '<th>Data</th>';
      						print '<th>Relato</th>';
      						print '<th>Periodo</th>';
      						print '<th>Dias a cumprir</th>';
      						print '<th>Efetuado por:</th>';
      						print '<th>Página:</th>';
      						print '<th>Impressão</th>';
    				print '</tr>';
  					print '<tbody>';

  					$array2 = $busca->BuscaSuspensoes($matricula);
  					for($i=0;$i<$result2;$i++){	
  						print $array2[$i];
  					}

  					print "</tbody>";
					print "</table>";
					print "</div>";

		}else{
			print 'Nenhuma Suspensão constada.';
		}

		print '<br>';
		print '<br>';
	}



?>