<?php include('../php/autenticar_sessao.php');?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    
        <meta charset="UTF-8">
        <title>SENAR - PESQUISAR TREINAMENTO</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">
                <h2>PESQUISAR TREINAMENTO</h2>
                <a href="treinamentos.php"> TREINAMENTO </a>
                <hr>
                <div class="btn-group">
                    <a class="btn btn-danger" href="" data-toggle="modal" data-target="#master" id="click_master" title="GERAR RELATÓRIO DOS TREINAMENTOS"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                </div>

                <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-6 text-center">
                        
                       
                        <p>

                            <div class="input-group">
                                <input type="text" class="form-control" id="data" placeholder="Nome do curso ou Nº do protocolo" autofocus>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" id="buscar" type="button" title="PESQUISAR TREINAMENTO">
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
        



              <!-- Modal busca datas -->
              <div class="modal fade" id="master" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                        <h3>GERAR RELATÓRIO</h3>
                    </div>
                    <div class="modal-body">

                    <form method="post" action="../pdf/gerador2.php" target="blank">
                        <div class="form-inline"> 
                            <label>Data inicial:</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              <input class="form-control" type="date" name="data1" required autofocus>
                            </div>
                        </div>

                        
                        <br>
                        
                        <div class="form-inline">   
                            <label>Data final:</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              <input class="form-control" type="date" name="data2" required>
                            </div>
                        </div>
                        

                        </div>
                        <div class="modal-footer">
                        
                            <p class="text-center"><button class="btn btn-danger">GERAR &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i></button></p>
                            
                        </div>
                    </form>    

                  </div>
                </div>
              </div>




    <footer></footer> 

    <script type="text/javascript">
        
        function buscar(data){
            var page = "../ajax/buscar_treinamento.php";
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

            let valor2 = u.searchParams.get('deletado');
            if(valor2 == 'true')
              swal('Deletado com sucesso!', '', 'success');
            else if(valor2 == 'false')
              swal('Erro ao deletar!', 'Existem alunos cadastrados no treinamento!', 'error');
        }          
    </script>   
    </body>
</html>