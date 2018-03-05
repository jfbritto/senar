<?php

    include('autenticar_sessao.php');

    // header("Content-Type: text/html; charset=UTF-8");

    include('config.php');

    $protocolo = filter_input(INPUT_GET, 'protocolo');



    $query = mysqli_query($conexao, "SELECT * FROM treinamento WHERE protocolo = '{$protocolo}'")or die(mysqli_error($conexao)); 


    if( mysqli_fetch_array($query) > 0 ) {
      
      // echo ' - protocolo JÁ CADASTRADO!';
      
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
