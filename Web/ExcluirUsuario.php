<?php 

/**
 * Exclui um usuario a partir das contas de administrador; 
 */
	
	require_once 'includes/Sessao.php';
  	include_once 'includes/Banco.php';

  	$id=$_GET['id'];

					
	print $sql="DELETE FROM `adm` WHERE idAdm=".$id;

	$resource = mysql_query($sql) or die(mysql_error());

	mysql_close($con);
	
	$_SESSION['confirmacao'] = 3;

	header("Location: VerUsuarios.php");


 ?>