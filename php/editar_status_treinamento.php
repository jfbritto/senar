<?php
    include('autenticar_sessao.php');

    // session_start();              
    // $fktreinamento = $_SESSION['fktreinamento'];
    // $id = $_SESSION['idtreinamento'];

    
    include('config.php');

    if (isset($_GET['idtr']) && isset($_GET['st'])) {
      
      $idtreinamento = base64_decode($_GET['idtr']);
      $st = $_GET['st'];

      $query = mysqli_query($conexao, "UPDATE treinamento SET status = $st WHERE idtreinamento = $idtreinamento ") or die(mysqli_error($conexao));

      if ($query) {

        if ($st==1) {
          header('location: ../usu/area_treinamento.php?idtr='.$_GET['idtr'].'&ativado=true');
        }else{
          header('location: ../usu/area_treinamento.php?idtr='.$_GET['idtr'].'&finalizado=true');
          
        }
      
      } else{

        if ($st==1) {
          header('location: ../usu/area_treinamento.php?idtr='.$_GET['idtr'].'&ativado=false');
        }else{
          header('location: ../usu/area_treinamento.php?idtr='.$_GET['idtr'].'&finalizado=false');
          
        }
      }

    }else{

      header('location: ../usu/area_treinamento.php?idtr='.$_GET['idtr'].'&finalizado=false');

    }


?>