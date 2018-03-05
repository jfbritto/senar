<?php
	include('autenticar_sessao.php');

	if (isset($_POST['nome'])) {
		
		$nome = mb_strtoupper(addslashes($_POST['nome']));
		$descricao = mb_strtoupper(addslashes($_POST['descricao']));

		if (empty($descricao)) {
			$descricao = '-';
		}

		include('config.php');

		$sql = "INSERT INTO curso(nome_curso, descricao) VALUES('$nome', '$descricao') ";

		$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
		
		if ($query) {

			header('location: ../usu/novo_curso.php?cadastrado=true');

		}else{

			header('location: ../usu/novo_curso.php?cadastrado=false');

		}



	}else{
		header('location: ../usu/novo_curso.php?cadastrado=false');
	}



?>