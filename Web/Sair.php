<?php
ini_set('session.save_path','/home/sistemamoe/');
	
		session_start('sistema');
		session_destroy();
		header("Location: index.php");
	

?>