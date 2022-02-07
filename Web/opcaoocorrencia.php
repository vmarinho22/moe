<?php
		//=========================Tipo de Ocorrencia!=======================================	
include 'includes/Banco.php';
		//print '<select name="cbo_tipooco" id="cbo_tipooco">';
		print '<select name="cbo_tipooco" class="form-control" id="cbo_nivel" required>';
		print '<option value="" disabled selected>Selecione uma opção</option>';
		$sql = "SELECT * From tipo_ocorrencia";
		$res= mysql_query($sql) or die(mysql_error());

		while($row=mysql_fetch_array($res)){
			print '<option value="'.$row['codigo'].'">'.$row['t_ocorrencia'].'</option>';
		}
		print '</select>';

		mysql_close();
?>