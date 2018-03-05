<?php include('../php/autenticar_sessao.php');?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <title>SENAR - ADD CURSO</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>

    <div class="container">

        <div class="jumbotron">
        
        <h2>ADICIONAR CURSO</h2>
        <a href="cursos.php"> CURSO </a>
        <hr>

            <div class="row">
                
                <div class="col-md-12">
                    
                    <div class="panel panel-default">

                        <form method="post" action="../php/cadastrar_curso.php" name="novocurso">

                        <div class="panel-body">   

                            <label>Nome</label><label style="color: red;">*</label>
                            <input class="form-control" type="text" name="nome" placeholder="Nome do curso" required autofocus>
                            <br>

                            <label>Descrição</label>
                            <input class="form-control" type="text" name="descricao" placeholder="Descrição do curso">
                            <br>

                            <p class="text-center">
                                <a class="btn btn-danger" href="cursos.php">CANCELAR</a>
                                <button class="btn btn-success">ADICIONAR</button>
                            </p> 
                        </div>
                        
                        </form>

                    </div>    
      

                </div>

            </div>

                
        </div>

    </div> 

    <footer></footer>    

    <script type="text/javascript">

        window.onload = function(){
            

            let url = window.location;
            let u = new URL(url);
            let valor = u.searchParams.get('cadastrado');
            if(valor == 'true')
              swal('Cadastrado com sucesso!', '', 'success');
            else if(valor == 'false')
              swal('Erro no cadastro!', '', 'error');

        }          
    </script>
    </body>
</html>