<?php

	/**
	 *  Transcreve o nivel do usario(String); 
	 */	
	include 'includes/Banco.php';
	print '<label for="">Nivel de Acesso</label><br>';
	//print '<select class="selectpicker" name="cbo_nivel" data-live-search="true">';
		print '<select name="cbo_nivel" class="form-control" id="cbo_nivel" required>';
		print '<option value="" disabled selected>Selecione uma opção</option>';
			$sql = "SELECT * from Niveis";
			$res= mysql_query($sql) or die(mysql_error());

			while($row=mysql_fetch_array($res)){
				print '<option value="'.$row['idNivel'].'">'.$row['Descricao'].'</option>';
			}
			print '</select> <br>';
			mysql_close($con);
?>