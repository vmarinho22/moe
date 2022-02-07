<?php
header('Content-Type: text/html; charset=utf-8');
 include 'includes/Banco.php';

class Usuario{
	
	private $usuario;
	private $senha;
	private $nome;
	private $nivel;
	private $cargo;

	// Set's	
	public function setUsuario($usuario){
			$this->usuario=$usuario;		
	}

	public function setNome($nome){
			$this->nome=$nome;		
	}

	public function setSenha($senha){
			$this->senha=$senha;
	}

	public function setNivel($nivel){
			$this->nivel=$nivel;
	}

	public function setCargo($cargo){
			$this->cargo=$cargo;
	}

	// Get's
	public function getUsuario(){ return $this->usuario; }

	public function getSenha(){	return $this->senha; }

	public function getNome(){	return $this->nome;	}

	public function getNivel(){	return $this->nivel; }

	public function getCargo(){	return $this->cargo; }


	// Valida o login do usurio
	public function validaLogin(){
		
		$sql="SELECT * FROM adm where loginAdm='$this->usuario' and senhaAdm='$this->senha'";
		$resource = mysql_query($sql) or die(mysql_error());

		while($row=mysql_fetch_array($resource)){
				$varrer++;
				$this->nome = $row['Nome'];
				$this->nivel = $row['Nivel'];
				$this->cargo = $row['Cargo'];
		}

		mysql_close($con);

		if($varrer==0){
			return 1;//Login Rejeitado
		}else{
			return 0; //Login Autorizado
		}

		
	}

	// Cadastra um usuario

	public function Cadastra(){
				

		$sql="SELECT loginAdm FROM adm where loginAdm ='$this->usuario'";
		$resource = mysql_query($sql) or die(mysql_error());

		while($row=mysql_fetch_array($resource)){
				$varrer++;
		}

		print $varrer;

		if($varrer>0){
			return false;//Login Rejeitado
		}

		print $sql="INSERT INTO `adm`(`loginAdm`, `senhaAdm`, `Nivel`, `Nome`,`Cargo`) VALUES ('".$this->usuario."','".$this->senha."',".$this->nivel.",'".$this->nome."','".$this->cargo."')";
		$resource = mysql_query($sql) or die(mysql_error());
		
		mysql_close($con);
	
		return true;

	}

	// Altera a senha de um usuario
	public function AlteraSenha($senhaantiga,$senhanova,$usuario){


		$sql="UPDATE `adm` SET `senhaAdm`=".'"'.$senhanova.'"'." WHERE `loginAdm`=".'"'.$usuario.'"'."AND `senhaAdm`=".'"'.$senhaantiga.'"';
		$resource = mysql_query($sql) or die(mysql_error());
		
		if(mysql_affected_rows()>0){
			return true;
		}else{
			return false;
		}	

		mysql_close($con);
	}


	
	
}

?>