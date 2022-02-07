<?php 

include 'includes/Banco.php';


class Professor{
	private $cod_identicacao;
	private $nome;
	private $codigoprofessor;

	// Set's
	
	public function setIdentificacao($cod_identicacao){
		$this->cod_identicacao = $cod_identicacao;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function setCodigo($codigoprofessor){
		$this->codigoprofessor = $codigoprofessor;
	}
	
	// Get's

	public function getIdentificao(){	return $this->cod_identicacao; 	}
	public function getNome(){	return $this->nome;	}
	public function getCodigo(){	return $this->codigoprofessor; }

	public function CadastraProfessor($nome,$codigo){
		$this->setNome($nome);
		$this->setCodigo($codigo);


		$sql="INSERT INTO professor(nome,Codigo) VALUES ('".$this->getNome()."','".$this->getCodigo()."')";
		$resource = mysql_query($sql) or die(mysql_error());
		
		if(mysql_affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}

	public function BuscaProfessor($pesquisa){
		if(!is_numeric($pesquisa)){
			$this->setNome($pesquisa);
			$this->setCodigo('null');
		}else{
			$this->setNome('null');
			$this->setCodigo($pesquisa);
		}


		$sql="SELECT * FROM professor where nome like '%".$this->getNome()."%' or Codigo=".$this->getCodigo();
		$res= mysql_query($sql) or die(mysql_error());
		$this->flag=0;
		$array = array();
		$i=0;

		while($row=mysql_fetch_array($res)){
			$this->flag=1;	

			$array[$i] = '<tr><td>'.$row['Codigo'].'</td><td>'.$row['nome'].'</td></tr>';
			$i++;						
         }

         return $array;
	}

	public function ExcluiProfessor($id){
		$this->setIdentificacao($id);
		$sql="DELETE FROM `professor` WHERE registro=".$this->getIdentificao();
		$res= mysql_query($sql) or die(mysql_error());

		if(mysql_affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}



}


?>