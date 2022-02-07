 <?php

 include 'includes/Banco.php';
 require_once 'includes/Sessao.php';



class Aluno{
	
	private $matricula;
	private $nome;
	private $turma;
	private $responsavel1;
	private $responsavel2;
	private $telefone1;
	private $telefone2;
	private $email;
	private $flag;

	// Set's
	
	public function setMatricula($matricula){
		$this->matricula = $matricula;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function setTurma($turma){
		$this->turma = $turma;
	}

	public function setResponsavel1($responsavel1){
		$this->responsavel1 = $responsavel1;
	}

	public function setResponsavel2($responsavel2){
		$this->responsavel2 = $responsavel2;
	}

	public function setTelefone1($telefone1){
		$this->telefone1 = $telefone1;
	}

	public function setTelefone2($telefone2){
		$this->telefone2 = $telefone2;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setFlag($flag){
		$this->flag = $flag;
	}

	// Get's

	public function getMatricula(){	return $this->matricula; }

	public function getNome(){ return $this->nome; }

	public function getTurma(){	return $this->turma; }

	public function getResponsavel1(){	return $this->responsavel1; }

	public function getResponsavel2(){	return $this->responsavel2;	}

	public function getTelefone1(){	return $this->telefone1; }

	public function getTelefone2(){	return $this->telefone2; }

	public function getEmail(){	return $this->email; }

	public function getFlag(){	return $this->flag;	}

	//Busca apenas um aluno 

	public function BuscaMatriculaAluno($matricula){
		$this->matricula=$matricula;

		$sql="SELECT matricula,nome,responsavel1,responsavel2,turma,telefone1,telefone2,email FROM aluno where matricula='$this->matricula'";
		$res= mysql_query($sql) or die(mysql_error());
		$this->flag=0;

		while($row=mysql_fetch_array($res)){
			$this->flag=1;	
			$this->nome = $row['nome'];
			$this->turma = $row['turma'];
			$this->responsavel1 = $row['responsavel1'];	
          	$this->responsavel2 = $row['responsavel2'];
          	$this->telefone1 = $row['telefone1'];
          	$this->telefone2 = $row['telefone2'];
          	$this->email = $row['email'];
									
         }
    }

    //Busca varios alunos


    public function BuscaNomesAlunos($nome){
		$this->nome = $nome;

		$sql="SELECT matricula,nome,turma,responsavel1 FROM aluno where nome like '%".$this->nome."%'";
		$res= mysql_query($sql) or die(mysql_error());
		$this->flag=0;
		$array = array();
		$i=0;

		while($row=mysql_fetch_array($res)){
			$this->flag=1;	

			$array[$i] = '<tr><td>'.$row['matricula'].'</td><td>'.$row['nome'].'</td><td>'.$row['turma'].'</td>';
			if($_SESSION['nivel']<=2){ 
				$array[$i] = $array[$i].'<td><a href="BuscaAlunolink.php?matricula='.$row['matricula'].'">Buscar</a>'.'</td></tr>';
			}
			$i++;						
         }

         return $array;
    }


    //Cadastra um aluno


    public function CadastraAluno($matricula,$nome,$turma,$responsavel1,$responsavel2,$telefone1,$telefone2,$email){
		$this->setMatricula($matricula);
		$this->setNome($nome);
		$this->setTurma($turma);
		$this->setResponsavel1($responsavel1);
		$this->setResponsavel2($responsavel2);
		$this->setTelefone1($telefone1);
		$this->setTelefone2($telefone2);
		$this->setEmail($email);


		print $sql="INSERT INTO `aluno`(`matricula`, `nome`, `responsavel1`, `responsavel2`, `turma`, `telefone1`, `telefone2`, `email`) VALUES ('".$this->getMatricula()."','".$this->getNome()."','".$this->getResponsavel1()."','".$this->getResponsavel2()."','".$this->getTurma()."',".$this->getTelefone1().",".$this->getTelefone2().",'".$this->getEmail()."')";
		$resource = mysql_query($sql) or die(mysql_error());
		
		if(mysql_affected_rows()>0){
			return true;
		}else{
			return false;
		}	

		
	}

	//Altera as informações do aluno


    public function AlteraAluno($matricula,$nome,$turma,$responsavel1,$responsavel2,$telefone1,$telefone2,$email){
		$this->setMatricula($matricula);
		$this->setNome($nome);
		$this->setTurma($turma);
		$this->setResponsavel1($responsavel1);
		$this->setTelefone1($telefone1);
		$this->setEmail($email);


		$sql="UPDATE `aluno` SET `nome`='".$this->getNome()."',`responsavel1`='".$this->getResponsavel1()."',`turma`='".$this->getTurma()."',`telefone1`=".$this->getTelefone1().",`email`='".$this->getEmail()."'";

		if($responsavel2==""){
			$this->setResponsavel2();
			$sql = $sql.",`responsavel2`='".$this->getResponsavel2()."'";
		}else{
			$this->setResponsavel2($responsavel2);
			$sql = $sql.",`responsavel2`='".$this->getResponsavel2()."'";
		}

		if($telefone2==""){
			$this->setTelefone2('null');
			$sql = $sql.",`telefone2`=".$this->getTelefone2();
		}else{
			$this->setTelefone2($telefone2);
			$sql = $sql.",`telefone2`=".$this->getTelefone2();
		}


		print $sql= $sql." WHERE `matricula`='".$this->getMatricula()."'";
		

		$resource = mysql_query($sql);
		
		if(mysql_affected_rows()>0){
			return true;
		}else{
			return false;
		}	

	 }


	


}


?>