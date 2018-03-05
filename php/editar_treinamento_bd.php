<?php
    include('autenticar_sessao.php');

    include('config.php');

    if (isset($_POST['curso'])) {
      
      $idtr = addslashes($_POST['idtr']);
      $idtreinamento = addslashes($_POST['idtreinamento']);
      $curso = addslashes($_POST['curso']);
      $protocolo = addslashes($_POST['protocolo']);
      $instrutor = mb_strtoupper(addslashes($_POST['instrutor']));
      $cidade = mb_strtoupper(addslashes($_POST['cidade']));
      $localidade = mb_strtoupper(addslashes($_POST['localidade']));
      $data_inicio = addslashes($_POST['data_inicio']);
      $data_fim = addslashes($_POST['data_fim']);

      $query = mysqli_query($conexao, "UPDATE treinamento SET fkcurso = '$curso', protocolo = '$protocolo', instrutor = '$instrutor', cidade_treinamento = '$cidade', localidade = '$localidade', data_inicio = '$data_inicio', data_fim = '$data_fim' WHERE idtreinamento = '$idtreinamento' ") or die(mysqli_error($conexao));

      if ($query) {
        
        header('location: ../usu/area_treinamento.php?idtr='.$idtr.'&editado=true');
      
      } else{
        header('location: ../usu/pesquisar_treinamento.php?editado=false');
      }

    }else{

      header('location: ../usu/pesquisar_treinamento.php?dadosincorretos=true');

    }


?>