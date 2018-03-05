<?php
session_start();
include('config.php');

if (isset($_POST['login']) && isset($_POST['login'])) {
	

$login = addslashes($_POST['login']); 
$senha = md5(addslashes($_POST['senha']));


$query = mysqli_query($conexao, "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' AND nivel = 1") or die(mysqli_error($conexao));
$result = mysqli_fetch_array($query);
$usu = mysqli_num_rows($query);




if ($usu > 0) {
	$_SESSION['nome'] = $result['nome_usu'];
	$_SESSION['email'] = $result['email_usu'];
	$_SESSION['login'] = $result['login'];
	$_SESSION['senha'] = $result['senha'];
	$_SESSION['nivel'] = $result['nivel'];
	header('location:../usu/index.php?entrou=true');
	exit;

}else{

	$query2 = mysqli_query($conexao, "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' AND nivel = 2") or die(mysqli_error($conexao));
	$result2 = mysqli_fetch_array($query2);
	$adm = mysqli_num_rows($query2);


	if ($adm > 0) {
		$_SESSION['nome'] = $result['nome_usu'];
		$_SESSION['email'] = $result['email_usu'];
		$_SESSION['login'] = $result2['login'];
		$_SESSION['senha'] = $result2['senha'];
		$_SESSION['nivel'] = $result2['nivel'];
		header('location:../adm/cadastrar_usu.php?entrou=true');
		exit;

	}else{

		header('location:../index.php?senhaincorreta=true');
		exit;

	}

}






}else{
	header('location:../index.php?senhaincorreta=true');
	exit;
}





?>