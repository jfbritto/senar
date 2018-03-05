<?php
    include('autenticar_sessao.php');

    include('config.php');

    if (isset($_GET['idcu']) && !empty($_GET['idcu'])) {
      
      $idcurso = $_GET['idcu'];

      $query = mysqli_query($conexao, "DELETE FROM curso WHERE idcurso = $idcurso");

      if ($query) {
        
        header('location: ../usu/pesquisar_curso.php?deletado=true');
      
      } else{
        header('location: ../usu/pesquisar_curso.php?deletado=false');
      }

    }else{

      header('location: ../usu/pesquisar_curso.php?deletadooooo=false');

    }


?>