<?php
	include('../php/autenticar_sessao.php');

	// if (isset($_GET['idtr'])) {
		

	$idtr= base64_decode($_GET['idtr']);

	include('../php/config.php');


	$sql = "SELECT * FROM participou p
			JOIN aluno a ON a.idaluno = p.fkaluno	
			JOIN treinamento t ON t.idtreinamento = p.fktreinamento
			JOIN curso c ON c.idcurso = t.fkcurso
			WHERE t.idtreinamento = $idtr";

	$query = mysqli_query($conexao, $sql) or die(mysqli_error());

	if (mysqli_num_rows($query) > 0) {

	$result = mysqli_fetch_array($query);

	$curso = $result['nome_curso'];
	$instrutor = $result['instrutor'];
	$cidade = $result['cidade_treinamento'];
	$localidade = $result['localidade'];
	$protocolo = $result['protocolo'];
	$data_inicio = date('d/m/Y', strtotime($result['data_inicio']));
	$data_fim = date('d/m/Y', strtotime($result['data_fim']));




	 // $aluno = $result['nome_aluno'];
	 // $cpf = $result['cpf'];
  //    $rg = $result['rg'];
	 // $cel = $result['cel'];
	 // $uf = $result['uf'];
	 // $cidade = $result['cidade'];
	 // $data_nascimento = date('d/m/Y', strtotime($result['data_nascimento']));




	}else{
		echo "<br><br><b><center>NÚMERO DE ALUNOS INSUFICIENTE PARA GERAÇÃO DESTE DOCUMENTO</center></b>";
		exit;
	}
		

	$html = "


		<!DOCTYPE html>
		<html lang=\"pt-br\">
		<head>
			<meta charset=\"UTF-8\">
			<title>PDF-RELATÓRIO</title>
			<link rel=\"stylesheet\" type=\"text/css\" href=\"../bootstrap/css/bootstrap.min.css\">
			
			<style>
				body{
					font-family: Calibri, DejaVu Sans, Arial;
					font-size: 7px;
					width: 210mm;
					height: 350mm;
					margin-left: auto;
					margin-right: auto;
					width: 100%;
				}
				.cabecalho-retorno{
					font-weight: bold;
					font-size: 8px;
					background-color: #005826;
					color: #FFFFFF;
					
				}

				.fonte{
					font-family: Calibri, DejaVu Sans, Arial;
				}


			</style>

		</head>
		<body>

		<p class=\"text-center\"><img style=\"width: 50px\" src=\"../img/logo.png\"></p>

			
				<h3 class=\"text-center fonte\"> RELATÓRIO TREINAMENTO <h3>
			
			<table class=\"table table-striped table-condensed table-bordered\" style=\"text-align: center; width:100%; font-size: 10px;\" border=\"0\" align=\"center\">
				<thead>
					<tr class=\"cabecalho-retorno\" style=\"font-size: 12px;\">
					    <th class=\"text-center\">CURSO</th>
					    <th class=\"text-center\">PROTOCOLO</th>
					    <th class=\"text-center\">CIDADE</th>
					    <th class=\"text-center\">LOCALIDADE</th>
					    <th class=\"text-center\">INICIO</th>
					    <th class=\"text-center\">FIM</th>
					    <th class=\"text-center\">INSTRUTOR</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style=\"vertical-align: middle;\"> $curso </td>
						<td style=\"vertical-align: middle;\"> $protocolo </td>
						<td style=\"vertical-align: middle;\"> $cidade </td>
						<td style=\"vertical-align: middle;\"> $localidade </td>
						<td style=\"vertical-align: middle;\"> $data_inicio </td>
						<td style=\"vertical-align: middle;\"> $data_fim </td>
						<td style=\"vertical-align: middle;\"> $instrutor </td>
					</tr>
				</tbody>

			</table>


				<h4 class=\"text-center fonte\"> PARTICIPANTES <h4>

			<table class=\"table table-striped table-condensed table-bordered\" style=\"text-align: center; width:100%\" border=\"0\" align=\"center\">
				<thead>
					<tr class=\"cabecalho-retorno\">
						<th class=\"text-center\"></th>
					    <th class=\"text-center\">ALUNO</th>
					    <th class=\"text-center\">CPF</th>
					    <th class=\"text-center\">RG</th>
					    <th class=\"text-center\">CEL</th>
					    <th class=\"text-center\">UF</th>
					    <th class=\"text-center\">CIDADE</th>
					    <th class=\"text-center\">NASCIMENTO</th>

					    <th class=\"text-center\">PTCP?</th>
					    <th class=\"text-center\">ESCOLARIDADE</th>
					    <th class=\"text-center\">ETNIA</th>
					    <th class=\"text-center\">SEXO</th>
					    <th class=\"text-center\">SITUAÇÃO</th>
					    <th class=\"text-center\">DFC</th>
					    <th class=\"text-center\">RENDA</th>
					    <th class=\"text-center\">CIVIL</th>
					    <th class=\"text-center\">FILHOS</th>
					</tr>
				</thead>
				<tbody>


	";

	$sql2 = "SELECT * FROM participou p
			JOIN aluno a ON a.idaluno = p.fkaluno	
			JOIN treinamento t ON t.idtreinamento = p.fktreinamento
			JOIN curso c ON c.idcurso = t.fkcurso
			WHERE t.idtreinamento = $idtr
			ORDER BY nome_aluno ASC";

	$query2 = mysqli_query($conexao, $sql2) or die(mysqli_error());


	$cont=1;	
	while ($result2 = mysqli_fetch_array($query2)){

	$nome = $result2['nome_aluno'];
	$cpf = $result2['cpf'];
    $rg = $result2['rg'];
	$cel = $result2['cel'];
	$uf = $result2['uf'];
	$cidade = $result2['cidade'];
	$data_nascimento = date('d/m/Y', strtotime($result2['data_nascimento']));

	$participou = $result2['ja_participou'];
	$escolaridade = $result2['escolaridade'];
    $etnia = $result2['etnia'];
	$sexo = $result2['sexo'];
	$situacao = $result2['situacao'];
	$deficiencia = $result2['qual_deficiencia'];
	$renda = $result2['renda'];
	$estado_civil = $result2['estado_civil'];
	$filhos = $result2['filhos'];
	

	$html .="";

	$html .="		<tr>";
	$html .="			<td style=\"vertical-align: middle;\"> $cont </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $nome </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $cpf </td>";
	$html .="		    <td style=\"vertical-align: middle;\"> $rg </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $cel </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $uf </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $cidade </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $data_nascimento </td>";

	$html .="			<td style=\"vertical-align: middle;\"> $participou </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $escolaridade </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $etnia </td>";
	$html .="		    <td style=\"vertical-align: middle;\"> $sexo </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $situacao </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $deficiencia </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $renda </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $estado_civil </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $filhos </td>";

	$html .="		</tr>";

	$html .="";

	$cont++;
	}

	$html .="
				</tbody>
			</body>
			</html>

	";



	require 'dompdf/autoload.inc.php';

	use Dompdf\Dompdf;

	$dompdf = new Dompdf();
	$dompdf->setPaper('A4', 'landscape');

	$dompdf->loadHTML($html);
	$dompdf->render();
	return $dompdf->stream("$protocolo", ["Attachment"=>0]);

	// }else{
	// 	echo "ERRO";
	// }																		
?>





