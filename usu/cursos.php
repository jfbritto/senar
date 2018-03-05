<?php include('../php/autenticar_sessao.php');?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        
        <meta charset="UTF-8">
        <title>SENAR - CURSOS</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">
            
            <h1>CURSO</h1>
            <!-- <a href="index.php">Home </a>/<a href="cursos.php"> Cursos</a> -->
            <hr>

                <div class="row">
                    
                    <a href="pesquisar_curso.php">
                        <div class="col-xs-6 box text-center">
                            <p><img class="img-box" src="../img/lupa.png"></p>
                            <p class="titulo-box">PESQUISAR</p>
                        </div>
                    </a>
                    <a href="novo_curso.php">
                        <div class="col-xs-6 box text-center">
                            <p><img class="img-box" src="../img/curso.png"></p>
                            <p class="titulo-box">NOVO</p>
                        </div>
                    </a>


                </div>

                    
            </div>

        </div>
    <footer></footer>    
    </body>
</html>