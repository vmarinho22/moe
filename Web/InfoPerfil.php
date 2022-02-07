<?php 

/**
 * Descreve os niveis de usuario;
 */
	require_once 'includes/Sessao.php';
  				print '<img src="img/avatar.png"  width="80px" /><br><br>';
  				print '<label for="">Nome: '.$_SESSION['nomeUser'].'</label><br>';
					
					include_once 'includes/Banco.php';
					$idnivel=  $_SESSION['nivel'];

					$sql="SELECT Descricao FROM Niveis where idNivel=".$idnivel;
					$resource = mysql_query($sql) or die(mysql_error());


					while($row=mysql_fetch_array($resource)){
						print '<label for="">Nivel de Acesso: '.utf8_encode($row['Descricao']).'</label><br>';

					}
					mysql_close($con);
				

				print '<label for="">Cargo: '.$_SESSION['cargo'].'</label><br>';


				print '<h2>Descrição </h2><br>';
				if ($idnivel==1) {
					print '<p>Seu perfil possui acesso total as informações de alunos, professores, e todas demais funções.</p>';
				}


				if ($idnivel==2) {
					print '<p>Seu perfil possui praticamento acesso total as informações de alunos, professores, e todas demais funções, porém com algumas limitações.</p>';
				}


				if ($idnivel==3) {
					print '<p>Seu perfil possui acesso informações de alunos, professores.</p>';
				}


				if ($idnivel==4) {
					print '<p>Seu perfil possui acesso  informações de alunos e faltas.</p>';
				}

?>