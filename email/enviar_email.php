<?php

	include('../php/autenticar_sessao.php');

	header("Content-type: text/html; charset=utf-8");


	if (!$sock = @fsockopen('www.google.com.br', 80, $num, $error, 5)){  
		$valor = ['retorno' => '2'];
	    echo json_encode($valor);
	    exit;  
	}

	$idtr = filter_input(INPUT_GET, 'idtr');



	//requere a biblioteca de pdf, está fora do loop
	use Dompdf\Dompdf;
	require '../pdf/dompdf/autoload.inc.php';
	require 'PHPMailer/PHPMailerAutoload.php';




	// if (isset($_GET['idtr'])) {
		

	// $idtr= base64_decode($_GET['idtr']);

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
	$valor = number_format($result['valor_treinamento'] ,2,",",".");
	$porcentagem = number_format($result['porcentagem_organizador'] ,2,",",".");
	$receber = number_format($result['receber'] ,2,",",".");



	 $aluno = $result['nome_aluno'];
	 $cpf = $result['cpf'];
     $rg = $result['rg'];
	 $cel = $result['cel'];
	 $uf = $result['uf'];
	 $cidade = $result['cidade'];
	 $data_nascimento = date('d/m/Y', strtotime($result['data_nascimento']));




	}else{
		$valor = ['retorno' => '3'];
	    echo json_encode($valor);
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
					    <th class=\"text-center\">INSTRUTOR</th>
					    <th class=\"text-center\">CIDADE</th>
					    <th class=\"text-center\">LOCALIDADE</th>
					    <th class=\"text-center\">PROTOCOLO</th>
					    <th class=\"text-center\">INICIO</th>
					    <th class=\"text-center\">FIM</th>				    
					</tr>
				</thead>
				<tbody>
					<tr>
						<td> $curso </td>
						<td> $instrutor </td>
						<td> $cidade </td>
						<td> $localidade </td>
						<td> $protocolo </td>
						<td> $data_inicio </td>
						<td> $data_fim </td>				
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

	$sql = "SELECT * FROM participou p
			JOIN aluno a ON a.idaluno = p.fkaluno	
			JOIN treinamento t ON t.idtreinamento = p.fktreinamento
			JOIN curso c ON c.idcurso = t.fkcurso
			WHERE t.idtreinamento = $idtr
			ORDER BY nome_aluno ASC";

	$query = mysqli_query($conexao, $sql) or die(mysqli_error());


	$cont=1;	
	while ($result = mysqli_fetch_array($query)){

	$nome = $result['nome_aluno'];
	$cpf = $result['cpf'];
    $rg = $result['rg'];
	$cel = $result['cel'];
	$uf = $result['uf'];
	$cidade = $result['cidade'];
	$data_nascimento = date('d/m/Y', strtotime($result['data_nascimento']));

	$participou = $result['ja_participou'];
	$escolaridade = $result['escolaridade'];
    $etnia = $result['etnia'];
	$sexo = $result['sexo'];
	$situacao = $result['situacao'];
	$deficiencia = $result['qual_deficiencia'];
	$renda = $result['renda'];
	$estado_civil = $result['estado_civil'];
	$filhos = $result['filhos'];
	

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

		


	$dompdf = new Dompdf();
	$dompdf->setPaper('A4', 'landscape');
	$dompdf->loadHTML($html);
	$dompdf->render();
	$output = $dompdf->output();
    file_put_contents("arquivos/$protocolo.pdf", $output);

	// return $dompdf->stream("$protocolo", ["Attachment"=>0]);



    $nome = $_SESSION['nome'];
    $destinatario = $_SESSION['email'];


    $mensagem = "

    <!DOCTYPE html>
    <html>
    <head>
    	<meta http-equiv=\"Content-Type\" content=\"charset=utf-8\" />
    	<title></title>

    		<style>
				
				body{
					text-align: justify;
				}

			</style>

    	

    </head>
    <body>	
	     <p><b>$nome</b>, Em anexo está o relatório do curso <b>$curso</b>, realizado em <b>$cidade</b>, na localidade de <b>$localidade</b> do dia <b>$data_inicio</b> ao dia <b>$data_fim</b>, ministrado pelo instrutor <b>$instrutor</b>.</p>
	     <p>PROTOCOLO: <b>$protocolo</b></p>
    
    </body>
    </html>

   

    ";
	


	//configurações básicas de endereço e protoloco 
	$mail = new PHPMailer; //faz a instância do objeto PHPMailer
	//$mail->SMTPDebug = true; //habilita o debug se parâmetro for true
	$mail->isSMTP(); //seta o tipo de protocolo
	$mail->Host = 'smtp.gmail.com'; //define o servidor smtp
	$mail->SMTPAuth = true; //habilita a autenticação via smtp
	$mail->SMTPOptions = [ 'ssl' => [ 'verify_peer' => false ] ];
	$mail->SMTPSecure = 'tls'; //tipo de segurança
	$mail->Port = 587; //porta de conexão
	$mail->FromName = "SENAR";
	
	//dados de autenticação no servidor smtp
	$mail->Username = 'jftcc.teste@gmail.com'; //usuário do smtp (email cadastrado no servidor)
	$mail->Password = 'testetcc'; //senha ****CUIDADO PARA NÃO EXPOR ESSA INFORMAÇÃO NA INTERNET OU NO FÓRUM DE DÚVIDAS DO CURSO****
	
	//dados de envio de e-mail
	// $mail->addAddress('jf.britto@hotmail.com', $nome); //e-mails para teste
	$mail->addAddress($destinatario, $nome); //descomentar para pegar email do banco!!!
	
	//configuração da mensagem
	$mail->isHTML(true); //formato da mensagem de e-mail
	$mail->Subject = utf8_decode("Relatório treinamento"); //assunto
	$mail->Body = utf8_decode($mensagem);
	// $mail->Body    = $mensagem; //Se o formato da mensagem for HTML você poderá utilizar as tags do HTML no corpo do e-mail
	$mail->AltBody = 'Caso não seja suportado o HTML, aqui vai a mensagem em texto'; //texto alternativo caso o html não seja suportado
	$mail->AddAttachment("arquivos/$protocolo.pdf"); 




	//envio e testes
	if(!$mail->send()) { //Neste momento duas ações são feitas, primeiro o send() (envio da mensagem) que retorna true ou false, se retornar false (não enviado) juntamente com o operador de negação "!" entra no bloco if.

		$valor = ['retorno' => '0'];
	    echo json_encode($valor);
	    exit; 

	} else {

		unlink("arquivos/$protocolo.pdf"); //remove os arquivos .pdf gerados na pasta

		$valor = ['retorno' => '1'];
	    echo json_encode($valor);
	    exit; 
	}






    // print($nome . " - " . $matricula)."<br><br>";




	
?>
