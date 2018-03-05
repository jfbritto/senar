<?php
	include('autenticar_sessao.php');

	if (isset($_POST['nome']) && isset($_POST['cpf'])) {
		
		$nome = mb_strtoupper(addslashes($_POST['nome']));
		$cpf = addslashes($_POST['cpf']);
		$rg = addslashes($_POST['rg']);
		$data_nascimento = addslashes($_POST['data_nascimento']);
		$tel = addslashes($_POST['tel']);
		$cel = addslashes($_POST['cel']);
		$uf = mb_strtoupper(addslashes($_POST['uf']));
		$cidade = mb_strtoupper(addslashes($_POST['cidade']));
		$participou = addslashes($_POST['participou']);
		$escolaridade = addslashes($_POST['escolaridade']);
		$etnia = addslashes($_POST['etnia']);
		$sexo = addslashes($_POST['sexo']);
		$situacao = addslashes($_POST['situacao']);
		$deficiencia_tem = addslashes($_POST['deficiencia_tem']);
		$deficiencia_qual = mb_strtoupper(addslashes($_POST['deficiencia_qual']));
		$renda = addslashes($_POST['renda']);
		$estado_civil = addslashes($_POST['estado_civil']);
		$filhos = addslashes($_POST['filhos']);

		if (empty($deficiencia_qual)) {
			$deficiencia_qual = '-';
		}

		if (empty($filhos)) {
			$filhos = 0;
		}

		include('config.php');

		$sql = "INSERT INTO aluno(nome_aluno, cpf, rg, data_nascimento, uf, cidade, tel, cel, ja_participou, escolaridade, etnia, sexo, situacao, tem_deficiencia, qual_deficiencia, renda, estado_civil, filhos) 
						   VALUES('$nome', '$cpf', '$rg', '$data_nascimento', '$uf', '$cidade', '$tel', '$cel', '$participou', '$escolaridade', '$etnia', '$sexo', '$situacao', '$deficiencia_tem', '$deficiencia_qual', '$renda', '$estado_civil', '$filhos') ";

		$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
		
		if ($query) {

			header('location: ../usu/novo_aluno.php?cadastrado=true');

		}else{

			header('location: ../usu/aluno.php?cadastrado=false');

		}

	}else{
		header('location: ../usu/novo_aluno.php?cadastrado=false');
	}



?>