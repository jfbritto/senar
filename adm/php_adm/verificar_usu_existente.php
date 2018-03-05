<?php

    include('../../php/autenticar_sessao.php');

    // header("Content-Type: text/html; charset=UTF-8");

    include('../../php/config.php');

    $loginusu = filter_input(INPUT_GET, 'loginusu');



    $query = mysqli_query($conexao, "SELECT * FROM usuario WHERE login = '{$loginusu}' ")or die(mysqli_error($conexao)); 


    if( mysqli_fetch_array($query) > 0 ) {
      
      // echo ' - usuario JÁ CADASTRADO!';
      
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
