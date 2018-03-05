<?php 

	session_start();
	if (!isset($_SESSION['senha']) && !isset($_SESSION['senha'])) {
		header('location: ../index.php?naologado=true');
		exit;
	}

?>