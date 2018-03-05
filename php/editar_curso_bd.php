<?php
    include('autenticar_sessao.php');

    include('config.php');

    if (isset($_POST['nome'])) {
      
      $idcurso = addslashes($_POST['idcurso']);
      $nome = mb_strtoupper(addslashes($_POST['nome']));
      $descricao = mb_strtoupper(addslashes($_POST['descricao']));

      if (empty($descricao)) {
        $descricao = '-';
      }

      $query = mysqli_query($conexao, "UPDATE curso SET nome_curso = '$nome', descricao = '$descricao' WHERE idcurso = $idcurso ") or die(mysqli_error($conexao));

      if ($query) {
        
        header('location: ../usu/pesquisar_curso.php?editado=true');
      
      } else{
        header('location: ../usu/pesquisar_curso.php?editado=false');
      }

    }else{

      header('location: ../usu/pesquisar_curso.php?editado=false');

    }


?>