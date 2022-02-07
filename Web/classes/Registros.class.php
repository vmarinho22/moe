<?php 
include 'includes/Banco.php';

/**

* Classe totalmento voltada para cadastro de ocorrências e registros escolares 

*/

class Registro {



    private $matricula;
    private $data;
    private $relato;
    private $professor;
    private $atendimento;
    private $tipo_ocorrencia;
    private $envia_email;
    private $envia_app;
    private $pagina;
    private $ata;
    private $hora;
    private $curso;
    private $unidade;
    private $codigo_tipoocorrencia;
    private $codigo_professor;
    private $codigo_atendimento;
    private $horariofinal;
    private $cumpridos;
    


    // Set's

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function setHorariofinal($horariofinal){
        $this->horariofinal = $horariofinal;
    }

    public function setDiasCumpridos($cumpridos){
        $this->cumpridos = $cumpridos;
    }

    public function setRelato($relato){
        $this->relato = $relato;
    }

    public function setPagina($pagina){
        $this->pagina = $pagina;
    }

    public function setUnidade($unidade){
        $this->unidade = $unidade;
    }

    public function setProfessor($professor){
        $this->professor = $professor;
    }

    public function setAtendimento($atendimento){
        $this->atendimento = $atendimento;
    }

    public function setTipoOco($tipo_ocorrencia){
        $this->tipo_ocorrencia = $tipo_ocorrencia;
    }

    public function setEmail($email){
        $this->enemail = $email;
    }

    public function setApp($app){
        $this->enapp = $app;
    }

    public function setAta($ata){
        $this->ata = $ata;
    }

    public function setPeriodo($periodo){
        $this->periodo = $periodo;
    }

    public function setHorario($hora){
        $this->hora = $hora;
    }

    public function setCurso($curso){
        $this->curso = $curso;
    }

    public function setCodigo_tipoocorrencia($codigo){
            $this->codigo_tipoocorrencia = $codigo;
    }
    
    public function setTipo_ocorrencia($tipo){
            $this->tipo_ocorrencia = $tipo;
    }
    
    public function setCodigo_professor($codigo){
            $this->codigo_professor = $codigo;
    }
    
    public function setCodigo_atendimento($codigo){
            $this->codigo_atendimento = $codigo;
    }

  

    // Get's

    public function getUsuario(){   return $this->usuario; }

    public function getMatricula(){ return $this->matricula; }

    public function getData(){  return $this->data; }

    public function getRelato(){ return $this->relato;  }

    public function getPagina(){ return $this->pagina;  }

    public function getProfessor(){ return $this->professor; }

    public function getAtendimento(){ return $this->atendimento; }

    public function getTipoOco(){ return $this->tipo_ocorrencia; }

    public function getEmail(){ return $this->enemail; }

    public function getApp(){ return $this->enapp; }

    public function getUnidade(){ return $this->unidade; }

    public function getAta(){ return $this->ata; }

    public function getDiasCumpridos(){ return $this->cumpridos; }

    public function getDia(){  return $this->dia; }

    public function getMes(){ return $this->mes; }

    public function getPeriodo(){ return $this->periodo; }

    public function getHorario(){ return $this->hora; }

    public function getCurso(){ return $this->curso; }

    public function getHorarioFinal(){ return $this->horariofinal; }

    public function GetCodigo_tipoocorrencia(){ return $this->codigo_tipoocorrencia; }
    
    public function GetTipo_ocorrencia(){   return $this->tipo_ocorrencia;  }
    
    public function GetCodigo_professor(){  return $this->codigo_tipoocorrencia; }
    
    public function GetCodigo_atendimento(){ return $this->codigo_atendimento;  }
    



    // Gera uma nova ocorrencia

    

    public function CadastraOcorrencia($matricula,$data,$relato,$professor,$atendimento,$tipooco,$email,$app,$usuario,$pagina,$unidade){

        $this->setMatricula($matricula);

        $this->setData($data); 

        $this->setRelato($relato); 

        $this->setProfessor($professor); 

        $this->setAtendimento($atendimento); 

        $this->setTipoOco($tipooco);

        $this->setEmail($email); 

        $this->setApp($app);

        $this->setUsuario($usuario); 

        $this->setPagina($pagina); 

        $this->setUnidade($unidade);

        $sql = "INSERT INTO registro_ocorrencia (dataoco,matricula,codigo_tipo_ocorrencia,registro_prof,descricao_ocorrencia,atendimento,enviar_email,enviar_app,Usuario,pagina,unidade) VALUES ('".$this->getData()."','".$this->getMatricula()."',".$this->getTipoOco().",".$this->getProfessor().",'".$this->getRelato()."',".$this->getAtendimento().",".$this->getEmail().",".$this->getApp().",'".$this->getUsuario()."',".$this->getPagina().",".$this->getUnidade().")";

        $res= mysql_query($sql);

        if(mysql_affected_rows()>0){

            return true;

        }else{

            return false;

        }   

        mysql_close($con);

     }


    // Pega os ids das ocorrencias para impressao 
    public function getIdOcorrencias($matricula){
        $this->setMatricula(trim($matricula));
        
        $sql="SELECT `numero_ocorrencia` FROM `registro_ocorrencia` WHERE matricula='".$this->getMatricula()."'  ORDER by dataoco ";
        
        $array = array();
        $x=0;
        $res= mysql_query($sql) or die(mysql_error());

        while($row=mysql_fetch_array($res)){
            $array[$x] = $row['numero_ocorrencia']; 
            $this->getUsuario($row['Usuario']);
            $x++;
        }
                

        return $array;
    }


     // Pega os ids das suspensoes para impressao 
    public function getIdSuspensoes($matricula){
        $this->setMatricula(trim($matricula));
        
        $sql="SELECT idSuspensao  FROM suspensao WHERE matricula='".$this->getMatricula()."'  ORDER by data ";
        
        $array = array();
        $x=0;
        $res= mysql_query($sql) or die(mysql_error());

        while($row=mysql_fetch_array($res)){
            $array[$x] = $row['idSuspensao']; 
            $this->getUsuario($row['Usuario']);
            $x++;
        }
                

        return $array;
    }

    // Busca as ocorrencias de um determinado aluno
    public function BuscaOcorrencias($matricula){

        $this->setMatricula($matricula);
        

        $sql="SELECT * FROM `registro_ocorrencia` WHERE matricula='".$this->getMatricula()."'  ORDER by dataoco ";
        
        $array = array();
        $x=0;
        $res= mysql_query($sql) or die(mysql_error());

        while($row=mysql_fetch_array($res)){
        // Verifica se a informaçção ultrapassa o tamanho da tabela
        $antiga = $row['descricao_ocorrencia'];
        $cont = strlen($antiga);
            if($cont>20){
                $palavras = explode(".", $row['descricao_ocorrencia']);
                $result = count($palavras);

                for($i=0;$i<=$result;$i++){
                    
                    if($palavras[$i]!=""){
                        $nova = $nova. $palavras[$i].'.<br>';
                    }
       
                }
            }else{
                $nova= $row['descricao_ocorrencia'];
            }

            
            $array[$x] = '<tr><td>'.$this->TrocaOcorrencia($row['codigo_tipo_ocorrencia']).'</td><td>'.date("d/m/Y", strtotime($row['dataoco'])).'</td><td>'.utf8_encode($nova).'</td><td>'.$this->TrocaProfessor($row['registro_prof']).'</td><td>'.$this->TrocaAtendimento($row['atendimento']).'</td><td>'.$row['Usuario'].'</td><td>'.$row['pagina'].'</td><td><a class="badge badge-primary" href="Imprimir.php?id='.$row['numero_ocorrencia'].'&matricula='.$this->getMatricula().'" target="_blank">Imprimir</a></td>';
            $x++;

            $nova="";
        } 

        return $array;
    }

    public function BuscaSuspensoes($matricula){

        $this->setMatricula($matricula);
        

        $sql="SELECT * FROM suspensao WHERE matricula='".$this->getMatricula()."'  ORDER by data ";
        
        $array = array();
        $x=0;
        $res= mysql_query($sql) or die(mysql_error());

        while($row=mysql_fetch_array($res)){
        // Verifica se a informaçção ultrapassa o tamanho da tabela
        $antiga = $row['relato'];
        $cont = strlen($antiga);
            if($cont>20){
                $palavras = explode(".", $row['relato']);
                $result = count($palavras);

                for($i=0;$i<=$result;$i++){
                    
                    if($palavras[$i]!=""){
                        $nova = $nova. $palavras[$i].'.<br>';
                    }
       
                }
            }else{
                $nova= $row['relato'];
            }

            
            $array[$x] = '<tr><td>'.$row['ata'].'</td><td>'.$row['data'].'</td><td>'.utf8_encode($nova).'</td><td>'.$this->TrocaPeriodo($row['periodo']).'</td><td>'.$row['diascumpridos'].'</td><td>'.$row['usuario'].'</td><td>'.$row['pagina'].'</td><td><a class="badge badge-primary" href="Imprimir.php?idSuspensao='.$row['idSuspensao'].'&matricula='.$this->getMatricula().'" target="_blank">Imprimir</a></td></tr>';
            $x++;

            $nova="";
        } 

        return $array;
    }

    // Pega a descricao da ocorrencia
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

    public function TrocaPeriodo($cod){
        
        switch ($cod) {
        case 2:
            $novop = "2 Dias"; 
        break;

        case 3:
            $novop = "3 Dias";
        break;

        case 4:
            $novop = "4 Dias";
        break;

        case 5:
            $novop = "5 Dias";
        break;        
                
        }
        
        return $novop;
    }
    
    // Pega a descricao do professor
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
    
        // Pega a descricao do atendimento
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

    public function ImprimirOcorrencia($matricula,$val){
        $this->setMatricula($matricula);
        
        $sql="SELECT *  FROM `registro_ocorrencia` WHERE matricula="."'".$this->getMatricula()."' AND numero_ocorrencia="."'".$val."'";
        //print $sql.'<br>';
        $res= mysql_query($sql) or die(mysql_error());
        
        //$this->setNumDados(mysql_num_rows($res));
        $x=0;
        while($row=mysql_fetch_array($res)){
            $data = date("d/m/Y", strtotime($row['dataoco']));
            $this->setData($data);
            $this->setRelato(utf8_encode($row['descricao_ocorrencia']));
            $this->setUsuario(utf8_encode($row['Usuario']));
            $this->setApp($row['enviar_app']);
        }
    }

    public function ImprimirSuspensao($matricula,$val){
        $this->setMatricula($matricula);
        
        $sql="SELECT *  FROM suspensao WHERE matricula="."'".$this->getMatricula()."' AND idSuspensao="."'".$val."'";
        $res= mysql_query($sql) or die(mysql_error());
        while($row=mysql_fetch_array($res)){
           $this->setAta($row['ata']);
           $this->setPagina($row['pagina']);
           $this->setData($row['data']); 
           $this->setHorario($row['horagerada']);
           $this->setUnidade($row['unidade']);
           $this->setCurso($row['curso']);
           $this->setRelato($row['relato']);
           $this->setPeriodo($row['periodo']);
           $this->setDiasCumpridos($row['diascumpridos']);
           $this->setHorariofinal($row['horafinal']);
           
        }
    }

    public function ContaPaginas(){
        $this->setMatricula($matricula);
        
        $sql="select count(idPagina) from paginas";
        $res= mysql_query($sql) or die(mysql_error());
        return mysql_result($res, 0);
    }


    public function TrocaLocalUnidade($unidade){
              
        $sql="select * from unidades where idUnidade=".$unidade;
        $res= mysql_query($sql) or die(mysql_error());
        while($row=mysql_fetch_array($res)){

            $local = $row['Descricao'].' '.$row['Local'];
        }

        return $local;
    }

   public function CadastrarSuspensao($matricula,$ata,$curso,$cumpridos,$relato,$pagina,$periodo,$unidade,$data,$hora,$horariofinal,$cumpridos,$usuario){
        $this->setMatricula($matricula);
        $this->setAta($ata);
        $this->setCurso($curso);
        $this->setRelato($relato);
        $this->setPagina($pagina);
        $this->setPeriodo($periodo);
        $this->setUnidade($unidade);
        $this->setData($data);
        $this->setHorario($hora);
        $this->setUsuario($usuario);
        $this->setHorariofinal($horariofinal);
        $this->setDiasCumpridos($cumpridos);

        $sql="INSERT INTO suspensao(matricula,ata,data,relato,periodo,diascumpridos,horafinal,pagina,unidade,curso,horagerada,usuario) VALUES ('".$this->getMatricula()."','".$this->getAta()."','".$this->getData()."','".$this->getRelato()."',".$this->getPeriodo().",'".$this->getDiasCumpridos()."','".$this->getHorariofinal()."',".$this->getPagina().",".$this->getUnidade().",'".$this->getCurso()."','".$this->getHorario()."','".$this->getUsuario()."')";

        $res= mysql_query($sql);

        if(mysql_affected_rows()>0){
            return true;
        }else{
            return false;
        }   

        mysql_close($con);

    }


    public function CadastraCategoria($descricao){
        $this->setRelato($descricao);

        $sql="INSERT INTO tipo_ocorrencia(t_ocorrencia) VALUES ('".$this->getRelato()."')";
        $resource = mysql_query($sql) or die(mysql_error());
        
        if(mysql_affected_rows()>0){
            return true;
        }else{
            return false;
        }   

    }


    public function DeletaCategora($id){
        $this->setRelato($id);

        $sql="DELETE FROM tipo_ocorrencia WHERE codigo=".$this->getRelato();
        $resource = mysql_query($sql) or die(mysql_error());
        
        if(mysql_affected_rows()>0){
            return true;
        }else{
            return false;
        }   

    }

    public function CadastraFalta($matricula,$data,$horario){
        $this->setMatricula($matricula);
        $this->setData($data);
        $this->setHorariofinal($horario);

        $sql="INSERT INTO faltas(matricula,data,horario) VALUES ('".$this->getMatricula()."','".$this->getData()."',".$this->getHorariofinal().")";
        $resource = mysql_query($sql) or die(mysql_error());
        
        if(mysql_affected_rows()>0){
            return true;
        }else{
            return false;
        }   

    }


    public function QtdeOcorrencias($matricula){
        $this->setMatricula($matricula);
        $sql="SELECT COUNT(numero_ocorrencia) FROM `registro_ocorrencia` WHERE matricula="."'".$this->getMatricula()."'";
        $res= mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_row($res);
        
        return $row[0];
    }

    

    

}

?>