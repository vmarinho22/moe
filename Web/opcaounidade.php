<?php
		//=========================Tipo de Ocorrencia!=======================================	
include 'includes/Banco.php';
		//print '<select name="cbo_tipooco" id="cbo_tipooco">';
		print '<select name="cbo_unidade" class="form-control" required>';
		print '<option value="" disabled selected>Selecione uma opção</option>';
		$sql = "SELECT * From unidades";
		$res= mysql_query($sql) or die(mysql_error());

		while($row=mysql_fetch_array($res)){
			print '<option value="'.$row['idUnidade'].'">'.$row['Descricao'].'</option>';
		}
		print '</select>';

		mysql_close();
?>