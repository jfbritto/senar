<?php
    include('../php/autenticar_sessao.php');
    
    include('../php/config.php');

    $idcurso = base64_decode($_GET['idcu']);

    $query = mysqli_query($conexao, "SELECT * FROM curso WHERE idcurso = $idcurso")or die(mysqli_error($conexao));
    $result = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <title>SENAR - EDITAR CURSO</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>

    <div class="container">

        <div class="jumbotron">
        
        <h2>EDITAR CURSO</h2>
        <a href="pesquisar_curso.php"> PESQUISAR CURSO </a>
        <hr>

            <div class="row">
                
                <div class="col-md-12">
                    
                    <div class="panel panel-default">

                        <form method="post" action="../php/editar_curso_bd.php" name="novocurso">

                        <div class="panel-body">   

                            <label>Nome</label><label style="color: red;">*</label>
                            <input class="form-control" type="text" name="nome" value="<?php echo $result['nome_curso']?>" required autofocus>
                            <br>

                            <label>Descrição</label>
                            <input class="form-control" type="text" name="descricao" value="<?php echo $result['descricao']?>">
                            <br>

                            <input type="hidden" name="idcurso" value="<?php echo $result['idcurso']?>">

                            <button class="btn btn-success">EDITAR</button>
                             
                        </div>
                        
                        </form>

                    </div>    
      

                </div>

            </div>

                
        </div>

    </div> 

    <footer></footer>    
    </body>
</html>