<?php
	include('../../php/autenticar_sessao.php');

	if (isset($_POST['login']) && isset($_POST['senha'])) {
		
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$login = addslashes($_POST['login']);
		$senha = md5(addslashes($_POST['senha']));
		$nivel = addslashes($_POST['nivel']);


		include('../../php/config.php');

		$sql = "INSERT INTO usuario(nome_usu, email_usu, login, senha, nivel) VALUES('$nome', '$email', '$login', '$senha', '$nivel') ";

		$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
		
		if ($query) {

			header('location: ../cadastrar_usu.php?cadastrado=true');

		}else{

			header('location: ../cadastrar_usu.php?cadastrado=false');

		}

	}else{
		header('location: ../cadastrar_usu.php?cadastrado=false');
	}



?>