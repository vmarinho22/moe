<?php 
	header('Content-Type: text/html; charset=utf-8');
	require_once 'includes/Sessao.php';


	$matricula = $_POST['txtmatricula'];

	$ata = $_POST['txtata'];
	$dias = $_POST['txtdias'];
    $mes = $_POST['txtmes'];
    $ano = $_POST['txtano'];
    $hora = $_POST['txthora'];
    
    $serie = $_POST['txtserie'];
    $curso = $_POST['txtcurso'];
    $relato = $_POST['txtrelato'];
    $periodo = $_POST['txtperiodo'];
    $diacumprido = $_POST['txtdiacumprido'];
   


  	/**
  	 * Pegar nome do usuario e cargo!!!
  	 */

?>