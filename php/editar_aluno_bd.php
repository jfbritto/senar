<?php
	include('autenticar_sessao.php');

	if (isset($_POST['nome']) && isset($_POST['cpf'])) {
		
		$idal = addslashes(base64_decode($_POST['idal']));
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

		$sql = "UPDATE aluno SET nome_aluno = '$nome', cpf = '$cpf', rg = '$rg', data_nascimento = '$data_nascimento', uf = '$uf', cidade = '$cidade', tel = '$tel', cel = '$cel', ja_participou = '$participou', escolaridade = '$escolaridade', etnia = '$etnia', sexo = '$sexo', situacao = '$situacao', tem_deficiencia = '$deficiencia_tem', qual_deficiencia = '$deficiencia_qual', renda = '$renda', estado_civil = '$estado_civil', filhos = '$filhos' WHERE idaluno = $idal";

		$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
		
		if ($query) {

			header('location: ../usu/area_aluno.php?editado=true&idal='.$_POST['idal'].'');

		}else{

			header('location: ../usu/area_aluno.php?editado=false&idal='.$_POST['idal'].'');

		}

	}else{
		header('location: ../usu/area_aluno.php?editado=false&idal='.$_POST['idal'].'');
	}



?>