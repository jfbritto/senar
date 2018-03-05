<?php include('../php/autenticar_sessao.php');?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <title>SENAR</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">

            <!-- <p class="text-center apagar-img"><img style="width: 60px;" src="../img/logo.png"></p> -->
            <hr class="apagar-img">

                <div class="row">
                    
                    <a href="cursos.php">
                        <div class="col-md-4 box text-center">
                            <p><img class="img-box" src="../img/curso.png"></p>
                            <p class="titulo-box cs">CURSO</p>
                        </div>
                    </a>
                    <a href="treinamentos.php">
                        <div class="col-md-4 box text-center">
                            <p><img class="img-box" src="../img/treinamento.png"></p>
                            <p class="titulo-box tr">TREINAMENTO</p>
                        </div>
                    </a>
                    <a href="alunos.php">
                        <div class="col-md-4 box text-center">
                            <p><img class="img-box" src="../img/aluno.png"></p>
                            <p class="titulo-box al">ALUNO</p>
                        </div>
                    </a>


                </div>
                <hr class="apagar-img">
            </div>

        </div>
        
    <footer></footer>    
    <script type="text/javascript">

        
            let url = window.location;
            let u = new URL(url);
            let valor = u.searchParams.get('entrou');
            if(valor == 'true')
              swal("Bem vindo!");


    </script>
    </body>
</html>