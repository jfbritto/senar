<?php include('../php/autenticar_sessao.php');?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    
        <meta charset="UTF-8">
        <title>SENAR - PESQUISAR CURSO</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">
                <h2>PESQUISAR CURSO</h2>
                <a href="cursos.php"> CURSO </a>
                <hr>

                <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-6 text-center">
                        <p>
                            <div class="input-group">
                                <input type="text" class="form-control" id="data" placeholder="Nome do curso" autofocus>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" id="buscar" type="button" title="PESQUISAR CURSO">
                                    <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                          </div>
                        </p>
                    </div>
                <div class="col-md-3"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div id="dados"></div>
                    </div>
                </div> 





            </div>

                
        </div>
        
    <footer></footer>    

    <script type="text/javascript">


        function buscar(data){
            var page = "../ajax/buscar_curso.php";
            $.ajax
                    ({
                        type: 'POST',
                        dataType: 'html',
                        url: page,
                        beforeSend: function () {
                            $("#dados").html("Carregando...");
                        },
                        data: {data: data},
                        success: function (msg)
                        {
                            $("#dados").html(msg);
                        }
                    });
        }
        
        
        $('#buscar').click(function () {
            buscar($("#data").val())
        });

        $('#data').keyup(function(e){
                $('#buscar').click();
        });

        window.onload = function(){
            
            document.getElementById("buscar").click();

            let url = window.location;
            let u = new URL(url);
            let valor = u.searchParams.get('cadastrado');
            if(valor == 'true')
              swal('Cadastrado com sucesso!', '', 'success');
            else if(valor == 'false')
              swal('Erro no cadastro!', '', 'error');

            let valor2 = u.searchParams.get('editado');
            if(valor2 == 'true')
              swal('Editado com sucesso!', '', 'success');
            else if(valor2 == 'false')
              swal('Erro na edição!', '', 'error');

            let valor3 = u.searchParams.get('deletado');
            if(valor3 == 'true')
              swal('Deletado com sucesso!', '', 'success');
            else if(valor3 == 'false')
              swal('Erro ao deletar', 'Curso está sendo usado em algum treinamento!', 'error');
        }  

        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
    </script>    
    </body>
</html>
