<?php
    header('Content-Type: text/html; charset=utf-8');
	include_once 'includes/Sessao.php';
    include_once 'includes/Banco.php';
    include_once 'classes/Aluno.class.php';

    $uploaddir = 'alunos/';
	$nomeNovo="arquivo";

	$uploadfile = $uploaddir.$nomeNovo;
	if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)){
		//echo "Arquivo Enviado";
		$arquivo = $uploaddir."arquivo";
	
		$envia = new Aluno;
                                    
		$fp = fopen($arquivo, 'r');
					
		while(!feof($fp)) {
			$line = fgets($fp);
			//$line = $line.';';
			// print $line."<br>";
			$data = array();
			$dados = explode(";", utf8_encode($line));
			/**
			 * [0] => turma;
			 * [1] => matricula;
			 * [2] => nome;
			 * [3] => email;
			 * [4] => resp1;
			 * [5] => tel1;
			 * [6] => resp2;
			 * [7] => tel2;
			 * 
			 */
			
			// var_dump($dados);
			// print '<br>';
			//
			// print 'Mat: '.$dados[1].'<br>';
			if($dados[0]!=null){			
						$sql = "SELECT * FROM aluno WHERE matricula=".$dados[1];
						// print '<br>';
			            $resource = mysql_query($sql) or die( mysql_error());
			            $num_rows = mysql_num_rows($resource);
						if ($num_rows == 0) {
						  	// print ' entrou aqui <br>';
						 	print $sql= "INSERT INTO qtdeOcorrencias(qtde, matricula) VALUES (0,".$dados[1].")";
							print '<br>';
			                $resource = mysql_query($sql) or die(mysql_error());
			   
			                
			                $envia->CadastraAluno($dados[1],$dados[2],$dados[0],$dados[4],$dados[6],$dados[5],$dados[7],$dados[3]);
			                if($resp){
						   	print '<br>deu certo<br>';
						   	}
							

						 }else{
						   $resp = $envia->AlteraAluno($dados[1],$dados[2],$dados[0],$dados[4],$dados[6],$dados[5],$dados[7],$dados[3]);
						     	//print ' n entrou aqui <br>';
						   if($resp){
						   	print '<br>deu certo<br>';
						   }

						}
			
			 			
		 	}else{
		 			break;
		 	}

		 }
		 	fclose($fp);

                        
  			echo  "<script>alert('Alunos Inseridos com sucesso!!');javascript:window.location='Aluno.php'</script>";
                        
		}else {
			echo  "<script>alert('Erro ao Inserir alunos!!');javascript:window.location='IncluiAlunos.php'</script>";
		}

		
	
	

?>