<?php include('../php/autenticar_sessao.php');?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    
        <meta charset="UTF-8">
        <title>SENAR - PESQUISAR ALUNO</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">
                <h2>PESQUISAR ALUNO</h2>
                <a href="alunos.php"> ALUNO </a>
                <hr>

                <div class="row">   
                <div class="col-md-3"></div>
                    <div class="col-md-6 text-center">
                        <p>
                            <div class="input-group">
                                <input type="text" class="form-control" id="data" placeholder="Nome do aluno ou Nº do CPF" autofocus>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" id="buscar" type="button" title="PESQUISAR ALUNO">
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
            var page = "../ajax/buscar_aluno.php";
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

        // $('#data').keydown(function(e){
        //     if(e.which == 13)
        //         $('#buscar').click();
        // });

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


            let valor2 = u.searchParams.get('deletado');
            if(valor2 == 'true')
              swal('Deletado com sucesso!', '', 'success');
            else if(valor2 == 'false')
              swal('Erro ao deletar!', 'Aluno cadastrado em treinamentos!', 'error');
         
        }      
    </script>     
    </body>
</html>