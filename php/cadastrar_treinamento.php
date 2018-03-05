<?php
	include('autenticar_sessao.php');

	if (isset($_POST['curso']) && isset($_POST['protocolo']) && isset($_POST['data_inicio']) && isset($_POST['data_fim'])) {
		
		$instrutor = mb_strtoupper(addslashes($_POST['instrutor']));
		$cidade = mb_strtoupper(addslashes($_POST['cidade']));
		$localidade = mb_strtoupper(addslashes($_POST['localidade']));
		$protocolo = addslashes($_POST['protocolo']);
		$data_inicio = addslashes($_POST['data_inicio']);
		$data_fim = addslashes($_POST['data_fim']);
		$curso = addslashes($_POST['curso']);
		$valor = addslashes($_POST['valor']);
		$porcentagem = addslashes($_POST['porcentagem']);

		if (empty($valor)) {
			$valor = 0;
		}
		if (empty($porcentagem)) {
			$valor = 0;
		}		


		$valor = str_replace("R$ ", "", $valor);//retira o cifrao

		$valor = str_replace(".", "", $valor);//retira o ponto

		$result = (($valor * $porcentagem) / 100);//calcula porcentagem

		$receber = number_format($result ,2,",",".");//formata para real
		
		$status = 1;

		include('config.php');

		$sql = "INSERT INTO treinamento(instrutor, cidade_treinamento, localidade, protocolo, data_inicio, data_fim, fkcurso, status, valor_treinamento, porcentagem_organizador, receber) 
					             VALUES('$instrutor', '$cidade', '$localidade', '$protocolo', '$data_inicio', '$data_fim', '$curso', '$status', '$valor', '$porcentagem', '$receber') ";

		$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
		
		if ($query) {

			header('location: ../usu/novo_treinamento.php?cadastrado=true');

		}else{

			header('location: ../usu/novo_treinamento.php?cadastrado=false');

		}



	}else{
		header('location: ../usu/novo_treinamento.php?cadastrado=false');
	}



?>