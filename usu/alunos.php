<?php include('../php/autenticar_sessao.php');?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <title>SENAR - ALUNOS</title>
        <?php include('../padrao/cabecalho.php');?>
        
    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">
                
                <h1>ALUNO</h1>
                <!-- <a href="index.php">Home </a>/<a href="alunos.php"> Alunos</a> -->
                <hr>

                <div class="row">
                    
                    <a href="pesquisar_aluno.php">
                        <div class="col-xs-6 box text-center">
                            <p><img class="img-box" src="../img/lupa.png"></p>
                            <p class="titulo-box">PESQUISAR</p>
                        </div>
                    </a>
                    <a href="novo_aluno.php">
                    <div class="col-xs-6 box text-center">
                        <p><img class="img-box" src="../img/novo_aluno.png"></p>
                        <p class="titulo-box">NOVO</p>
                    </div>
                    </a>


                </div>

                    
            </div>

        </div>
        
    <footer></footer>    
    </body>
</html>