<?php
	
	$host = 'localhost';
	$usu = 'root';
	$pass = '123456';
	$banco = 'senar';

	$conexao = mysqli_connect($host, $usu, $pass, $banco) or die(mysqli_error());

?>
