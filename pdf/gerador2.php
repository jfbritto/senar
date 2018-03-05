<?php
	include('../php/autenticar_sessao.php');

	// if (isset($_GET['idtr'])) {
		

	$data1 = $_POST['data1'];
	$data2 = $_POST['data2'];

	$data1mdf = date('d/m/Y', strtotime($data1));
	$data2mdf = date('d/m/Y', strtotime($data2));
	include('../php/config.php');


	$sql = "SELECT * FROM treinamento t
			JOIN curso c ON c.idcurso = t.fkcurso
			WHERE t.data_inicio BETWEEN ('$data1') AND ('$data2')
			ORDER BY t.data_inicio asc";

	$query = mysqli_query($conexao, $sql) or die(mysqli_error());
	$cont = mysqli_num_rows($query);

	if ($cont <= 0) {
		echo "<br><br><b><center>NÚMERO DE TREINAMENTOS INSUFICIENTE PARA GERAÇÃO DESTE DOCUMENTO</center></b>";
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
					font-size: 10px;
					width: 210mm;
					height: 350mm;
					margin-left: auto;
					margin-right: auto;
					width: 100%;
				}
				.cabecalho-retorno{
					font-weight: bold;
					font-size: 12px;
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

			
				<h3 class=\"text-center fonte\"> TREINAMENTOS <h3>

		


				<h4 class=\"text-center fonte\"> DE <b>$data1mdf</b> Á <b>$data2mdf</b> <h4>

			<table class=\"table table-striped table-condensed table-bordered\" style=\"text-align: center; width:100%\" border=\"0\" align=\"center\">
				<thead>
					<tr class=\"cabecalho-retorno\" style=\"font-size: 12px;\">
						<th class=\"text-center\"></th>
					    <th class=\"text-center\">CURSO</th>
					    <th class=\"text-center\">INSTRUTOR</th>
					    <th class=\"text-center\">CIDADE</th>
					    <th class=\"text-center\">LOCALIDADE</th>
					    <th class=\"text-center\">PROTOCOLO</th>
					    <th class=\"text-center\">INICIO</th>
					    <th class=\"text-center\">FIM</th>
					    <th class=\"text-center\">VALOR</th>
					    <th class=\"text-center\">%</th>
					    <th class=\"text-center\">RECEBER</th>
					</tr>
				</thead>
				<tbody>


	";

	$tot=0;
	$cont=1;	
	while ($result = mysqli_fetch_array($query)){

	$curso = $result['nome_curso'];
	$instrutor = $result['instrutor'];
	$cidade = $result['cidade_treinamento'];
	$localidade = $result['localidade'];
	$protocolo = $result['protocolo'];
	$data_inicio = date('d/m/Y', strtotime($result['data_inicio']));
	$data_fim = date('d/m/Y', strtotime($result['data_fim']));
	$valor = $result['valor_treinamento'];
	$porcentagem = $result['porcentagem_organizador'];
	$receber = $result['receber'];	
	

	$html .="";

	$html .="		<tr>";
	$html .="			<td style=\"vertical-align: middle;\"> $cont </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $curso </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $instrutor </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $cidade </td>";
	$html .="		    <td style=\"vertical-align: middle;\"> $localidade </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $protocolo </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $data_inicio </td>";
	$html .="			<td style=\"vertical-align: middle;\"> $data_fim </td>";
	$html .="			<td style=\"vertical-align: middle;\">R$$valor </td>";
	$html .="			<td style=\"vertical-align: middle;\">$porcentagem%</td>";
	$html .="			<td style=\"vertical-align: middle;\">R$$receber </td>";

	$html .="		</tr>";

	$html .="";

	$tot= $tot + $result['receber'];
	$cont++;
	}

	$tot = number_format($tot ,2,",",".");//formata para real

	$html .="		<tr>";
	$html .="			<td colspan=\"10\" style=\"vertical-align: middle; text-align:right\"> <b>TOTAL</b> </td>";

	$html .="			<td style=\"vertical-align: middle;\"><b>R$$tot </b></td>";

	$html .="		</tr>";
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
																	
?>





