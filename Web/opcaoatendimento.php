<?php
//=========================Atendimento!==============================================	
include 'includes/Banco.php';
		//print '<select name="cbo_atendimento" id="cbo_atendimento">';
		print '<select name="cbo_atendimento" class="form-control" id="cbo_nivel" required>';
		print '<option value="" disabled selected>Selecione uma opção</option>';

			$sql = "SELECT * From atendimento";
			$res= mysql_query($sql) or die(mysql_error());

			while($row=mysql_fetch_array($res)){
				print '<option value="'.$row['id'].'">'.$row['tipo'].'</option>';
			};
			print '</select>';

			mysql_close();
?>