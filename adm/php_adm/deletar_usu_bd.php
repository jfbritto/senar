<?php
    include('../../php/autenticar_sessao.php');
    
    include('../../php/config.php');

    if (isset($_POST['idusu']) && !empty($_POST['idusu'])) {
      
      $idusu = $_POST['idusu'];

      $query = mysqli_query($conexao, "DELETE FROM usuario WHERE idusuario = $idusu");

      if ($query) {
        
        header('location: ../deletar_usu.php?deletado=true');
      
      }else{
        header('location: ../deletar_usu.php?deletado=false');
      }

    }else{

      header('location: ../deletar_usu.php?deletado=false');

    }


?>