<?php
    include('autenticar_sessao.php');

    include('config.php');

    if (isset($_GET['idtr']) && !empty($_GET['idtr'])) {
      
      $idtreinamento = $_GET['idtr'];
      $idtr = base64_encode($_GET['idtr']);  


      $query = mysqli_query($conexao, "DELETE FROM treinamento WHERE idtreinamento = $idtreinamento");

      if ($query) {
        
        header('location: ../usu/pesquisar_treinamento.php?deletado=true');
      
      } else{
        header('location: ../usu/area_treinamento.php?idtr='.$idtr.'&deletado=false');
      }

    }else{

      header('location: ../usu/pesquisar_treinamento.php?deletado=false');

    }


?>