<?php
	session_start();
		session_destroy();
		header("location:../loja/loja.php");
?>