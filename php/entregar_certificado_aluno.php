<?php
    include('autenticar_sessao.php');
    
    $fktreinamento = $_SESSION['fktreinamento'];
    $id = $_SESSION['idtreinamento'];

    
    include('config.php');

    if (isset($_GET['certificado']) && !empty($_GET['certificado'])) {
      
      $idaluno = $_GET['fkal'];

      $query = mysqli_query($conexao, "UPDATE participou SET certificado = 1 WHERE fktreinamento = $fktreinamento AND fkaluno = $idaluno");

      if ($query) {
        
        header('location: ../usu/area_treinamento.php?idtr='.$id.'&certificadoentregue=true');
      
      } else{
        header('location: ../usu/area_treinamento.php?idtr='.$id.'&certificadoentregue=false');
      }

    }else{

      header('location: ../usu/area_treinamento.php?idtr='.$id.'&certificadoentregueeeee=false');

    }


?>
