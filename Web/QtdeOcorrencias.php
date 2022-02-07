<?php
    header('Content-Type: text/html; charset=utf-8');
    include_once 'classes/Registros.class.php';
    include 'includes/Banco.php';
    
    if(isset($_POST['matricula'])){
        $matricula = $_POST['matricula'];
        $varre = new Registro;
                
        $cont2 = $varre->QtdeOcorrencias($matricula);
        $sql = "SELECT * FROM `qtdeOcorrencias` WHERE matricula='".$matricula."'";
	    $res= mysql_query($sql) or die(mysql_error());
        
	    $row = mysql_fetch_row($res);
		
	    $qtde = $row[0];
        
        $sql= "UPDATE `qtdeOcorrencias` SET `qtde`=".$cont2." WHERE matricula='".$matricula."'";
        $resource = mysql_query($sql) or die(mysql_error());
	       
        echo $cont2.";".$qtde.";";
    }else{
        echo 'false';
    }
    
    
?>
