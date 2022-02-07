<?php
	
class TrocaDados{
	private $codigo_tipoocorrencia;
	private $tipo_ocorrencia;
	private $codigo_professor;
	private $professor;
	private $codigo_atendimento;
	private $atendimento;
	
	public function setCodigo_tipoocorrencia($codigo){
			$this->codigo_tipoocorrencia = $codigo;
	}
	
	public function setTipo_ocorrencia($tipo){
			$this->tipo_ocorrencia = $tipo;
	}
	
	public function setCodigo_professor($codigo){
			$this->codigo_professor = $codigo;
	}
	
	public function setProfessor($tipo){
			$this->professor = $tipo;
	}
	
	public function setCodigo_atendimento($codigo){
			$this->codigo_atendimento = $codigo;
	}
	
	public function setAtendimento($tipo){
			$this->atendimento = $tipo;
	}
	
	public function GetCodigo_tipoocorrencia(){
		return $this->codigo_tipoocorrencia;
	}
	
	public function GetTipo_ocorrencia(){
		return $this->tipo_ocorrencia; 
	}
	
	public function GetCodigo_professor(){
		return $this->codigo_tipoocorrencia;
	}
	
	public function GetProfessor(){
		return $this->professor; 
	}
	
	public function GetCodigo_atendimento(){
		return $this->codigo_atendimento;
	}
	
	public function GetAtendimento(){
		return $this->atendimento; 
	}

		
	public function TrocaOcorrencia($cod){
		include_once 'includes/Banco.php'; 
		include_once 'includes/Sessao.php';
		
		$this->setCodigo_tipoocorrencia($cod);
		$sql="SELECT t_ocorrencia FROM tipo_ocorrencia where codigo="."'".$this->codigo_tipoocorrencia."'";
		$res2= mysql_query($sql) or die(mysql_error());
		$row2 = mysql_fetch_array($res2);
		$this->setTipo_ocorrencia($row2['t_ocorrencia']);
		
		return $this->GetTipo_ocorrencia();
	}
	
	public function TrocaProfessor($cod){
		include_once 'includes/Banco.php'; 
		include_once 'includes/Sessao.php';
		
		$this->setCodigo_professor($cod);
		$sql="SELECT nome FROM professor where registro="."'".$this->codigo_professor."'";
		$res2= mysql_query($sql) or die(mysql_error());
		$row2 = mysql_fetch_array($res2);
		$this->setProfessor($row2['nome']);
		
		return $this->GetProfessor();
	}
	
	public function TrocaAtendimento($cod){
		include_once 'includes/Banco.php'; 
		include_once 'includes/Sessao.php';
		
		$this->setCodigo_atendimento($cod);
		$sql="SELECT * FROM atendimento where id="."'".$this->GetCodigo_atendimento()."'";
		$res2= mysql_query($sql) or die(mysql_error());
		$row2 = mysql_fetch_array($res2);
		$this->setAtendimento($row2['tipo']);
		
		return $this->GetAtendimento();
	}
	
}
?>