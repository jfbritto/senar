<?php
    include('autenticar_sessao.php');

    include('config.php');

    if (isset($_GET['idal']) && !empty($_GET['idal'])) {
      
      $idaluno = base64_encode($_GET['idal']);
      $idal = $_GET['idal'];

      $query = mysqli_query($conexao, "DELETE FROM aluno WHERE idaluno = $idal");

      if ($query) {
        
        header('location: ../usu/pesquisar_aluno.php?deletado=true');
      
      }else{
        header('location: ../usu/area_aluno.php?idal='.$idaluno.'&deletado=false');
      }

    }else{

      header('location: ../usu/area_aluno.php?idal='.$idaluno.'&deletado=false');

    }


?>