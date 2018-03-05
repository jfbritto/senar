<?php

    include('autenticar_sessao.php');

    // header("Content-Type: text/html; charset=UTF-8");

    include('config.php');

    $idal = filter_input(INPUT_GET, 'data');
    $idtr = filter_input(INPUT_GET, 'idtr');



    $query = mysqli_query($conexao, "SELECT * FROM participou WHERE fkaluno = '{$idal}' AND fktreinamento = '{$idtr}'")or die(mysqli_error($conexao)); 


    if( mysqli_fetch_array($query) > 0 ) {
      
      // echo ' - aluno JÁ CADASTRADO!';
      
      $valor = ['retorno' => '1'];
      echo json_encode($valor);
      exit;

    }else{
      // echo 'nao cadastrado';

      $valor = ['retorno' => '0'];
      echo json_encode($valor);
      exit;
    }


  ?>
