<?php

    include('autenticar_sessao.php');

    // header("Content-Type: text/html; charset=UTF-8");

    include('config.php');

    $cpf = filter_input(INPUT_GET, 'cpf');

    // Verifica se um número foi informado
    // if(empty($cpf)) {

    //   $valor = ['retorno' => '0'];
    //   echo json_encode($valor);
    //   exit;

    // }
 
    // // Elimina possivel mascara
    // $cpf = ereg_replace('[^0-9]', '', $cpf);
    // $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    // Verifica se o numero de digitos informados é igual a 11 
    if (strlen($cpf) != 11) {

      $valor = ['retorno' => '0'];
      echo json_encode($valor);
      exit;

    }
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {

      $valor = ['retorno' => '2'];
      echo json_encode($valor);
      exit;
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
     } else {   
         
        for ($t = 9; $t < 11; $t++) {
             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
              
              $valor = ['retorno' => '2'];
              echo json_encode($valor);
              exit;
            }
        }
 
    $query = mysqli_query($conexao, "SELECT * FROM aluno WHERE cpf = '{$cpf}'")or die(mysqli_error($conexao)); 
    if( mysqli_fetch_array($query) > 0 ) {
      
      $valor = ['retorno' => '1'];
      echo json_encode($valor);
      exit;

    }

    $valor = ['retorno' => '3'];
    echo json_encode($valor);
    exit;
    
    }











  ?>