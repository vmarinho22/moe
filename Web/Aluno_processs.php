<?php 
	require_once 'includes/Sessao.php';
	include_once 'classes/Aluno.class.php';

	/**
	 * Verifica se o botão foi pressionado
	 */
	
	if(isset($_POST['btn_enviar']) || $_SESSION['matricula'] || isset($_POST['txtaluno'])){

		if(isset($_SESSION['matricula'])){
			$aluno = $_SESSION['matricula'];
		}else{
			
			$aluno = $_POST['txtaluno'];
		}
		$busca=new Aluno;

		/**
	 	* Verifica se foi enviado uma matricula ou nome do aluno;
	 	*/

		if(is_numeric($aluno)){
			
			/**
			 * Pega a matricula do aluno
			 */
			
			$busca->BuscaMatriculaAluno($aluno);
				
			         			
				if(!$busca->getFlag()==0){	
				
					print '<table class="table table-bordered">';
					print "<thead>";
							print"<tr>";
								print"<th>Matricula</th>";
								print"<td>".$busca->getMatricula()."</td>";
							print"</tr>";
					print "</thead>";
						print "<tbody>";
						print"<tr>";
							print"<th>Nome</th>";
							print"<td>".$busca->getNome()."</td>";
						print"</tr>";
						print"<tr>";
							print"<th>Turma</th>";
							print"<td>".$busca->getTurma()."</td>";
						print"</tr>";
						
						if($busca->getResponsavel2()=="" || $busca->getResponsavel2()=="null"){
							print"<tr>";
									print"<th>Responsavel</th>";
									print"<td>".$busca->getResponsavel1()."</td>";
							print"</tr>";
							
						}else{
							print"<tr>";
									print"<th>Responsavel 1</th>";
									print"<td>".$busca->getResponsavel1()."</td>";
							print"</tr>";
							print"<tr>";						
								print"<th>Responsavel 2</th>";
								print"<td>".$busca->getResponsavel2()."</td>";
							print"</tr>";
						}
						
						if($busca->getTelefone2()=="" || $busca->getTelefone2()=="null"){
						print"<tr>";
							print"<th>Telefone</th>";
							print"<td>".$busca->getTelefone1()."</td>";
						print"</tr>";
						
						}else{

							print"<tr>";
									print"<th>Telefone 1</th>";
									print"<td>".$busca->getTelefone1()."</td>";
							print"</tr>";
							print"<tr>";
								print"<th>Telefone 2</th>";
								print"<td>".$busca->getTelefone2()."</td>";
							print"</tr>";
						}
							print"<tr>";
								print"<th>Email</th>";
								print"<td>".$busca->getEmail()."</td>";
							print"</tr>";


							print '<tr>';
						print '<th>Faltas</th>';
								 $sql="select count(idfaltas) from faltas where matricula=".$busca->getMatricula();
						        $res= mysql_query($sql) or die(mysql_error());
						        $faltas = mysql_result($res, 0);
						print '<td>'.$faltas.'</td>';        
						print '</tr>';

							if($_SESSION['nivel']<=2){
								print"<tr>";
									print"<th>Opções</th>";
									print'<td><a href="CadastraAlunos.php?matricula='.$busca->getMatricula().'">Alterar</a></td>';
								print"</tr>";
							}



						print "</tbody>";
					print "</table>";

					unset($_SESSION['matricula']);

				}else{

					print '<font color="red"> Aluno não Encontrado!! </font>';
			}	
		}else{

			$alunos = $busca->BuscaNomesAlunos($aluno);

			if(!$busca->getFlag()==0){
				print '<table class="table table-bordered">';
    				print '<tr>';
      						print '<th>Matricula</th>';
      						print '<th>Nome Completo</th>';
      						print '<th>Turma</th>';
      						if($_SESSION['nivel']<=2){ print '<th></th>'; }
    				print '</tr>';
  					print '<tbody>';

  				$num = count($alunos);

  				for($i=0;$i<$num;$i++){
  					print $alunos[$i];
  				}

  					print "</tbody>";
				print "</table>";

  			}else{
  				print '<font color="red"> Não existe nenhum aluno matriculado com esse nome!! </font>';
  			}
		}
	}

?>