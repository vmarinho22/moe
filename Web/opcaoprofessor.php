<?php
//=======================Professor==================================================	
include 'includes/Banco.php';
		// print '<select name="cbo_professor" id="cbo_professor">';
		print '<select name="cbo_professor" class="form-control" id="cbo_nivel" required>';
		print '<option value="" disabled selected>Selecione uma opção</option>';
			$sql = "SELECT * from professor";
			$res= mysql_query($sql) or die(mysql_error());

			while($row=mysql_fetch_array($res)){
				print '<option value="'.$row['registro'].'">'.$row['nome'].'</option>';
			}
			print '</select>';
			mysql_close($con);
			
?>