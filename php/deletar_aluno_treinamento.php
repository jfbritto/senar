<?php
    include('autenticar_sessao.php');
    
    $fktreinamento = $_SESSION['fktreinamento'];
    $id = $_SESSION['idtreinamento'];

    
    include('config.php');

    if (isset($_GET['fkal']) && !empty($_GET['fkal'])) {
      
      $idaluno = $_GET['fkal'];

      $query = mysqli_query($conexao, "DELETE FROM participou WHERE fktreinamento = $fktreinamento AND fkaluno = $idaluno");

      if ($query) {
        
        header('location: ../usu/area_treinamento.php?idtr='.$id.'&alunodeletado=true');
      
      } else{
        header('location: ../usu/area_treinamento.php?idtr='.$id.'&alunodeletado=false');
      }

    }else{

      header('location: ../usu/area_treinamento.php?idtr='.$id.'&alunodeletado=false');

    }


?>
