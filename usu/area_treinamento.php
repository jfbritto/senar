<?php
    include('../php/autenticar_sessao.php');

    include('../php/config.php');
    $id = base64_decode($_GET['idtr']);
    $query = mysqli_query($conexao, "SELECT * FROM treinamento t 
                                     JOIN curso c ON c.idcurso = t.fkcurso  
                                     WHERE t.idtreinamento = $id") or die(mysqli_error($conexao));
    $result = mysqli_fetch_array($query);
    $_SESSION['fktreinamento'] = $result['idtreinamento'];
    $_SESSION['idtreinamento'] = base64_encode($id);

    $query2 = mysqli_query($conexao, "SELECT * FROM aluno ORDER BY nome_aluno");

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <title>SENAR - ÁREA TREINAMENTO</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">
            

                <h2>TREINAMENTO</h2>
                <a href="pesquisar_treinamento.php"> PESQUISAR TREINAMENTO </a>
                <hr>

                <div class="btn-group"> 
                  <?php if($result['status']==1){ ?>  
                  <a type="button" class="btn btn-default" href='../php/editar_status_treinamento.php?idtr=<?php echo $_GET['idtr'];?>&st=0' title="FINALIZAR TREINAMENTO"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                  <?php }else{ ?>
                  <a type="button" class="btn btn-success" href='../php/editar_status_treinamento.php?idtr=<?php echo $_GET['idtr'];?>&st=1' title="ATIVAR TREINAMENTO"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                  <?php } ?>
                  
                  <a type="button" class="btn btn-danger" <?php echo ($result['status'] == 1 ? '' : 'disabled') ?>  
                  <?php echo ($result['status'] == 1 ? "onClick=confirmacao2(".$id.")" : '') ?> title="EXCLUIR TREINAMENTO">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>

                  <a type="button" class="btn btn-warning" <?php echo ($result['status'] == 1 ? '' : 'disabled') ?> 
                  <?php echo ($result['status'] == 1 ? "href=editar_treinamento.php?idtr=".$_GET['idtr'] : '') ?> title="EDITAR TREINAMENTO">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </a>


                  <a type="button" class="btn btn-danger" href='../pdf/gerador.php?idtr=<?php echo $_GET['idtr'];?>' onclick="window.open(this.href,'galeria','width=1000,height=1000'); return false;"  title="GERAR RELATÓRIO EM PDF"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>


<!--                   <a type="button" class="btn btn-primary fas" id="email" name="email"   title="ENVIAR EMAIL">
                    <font id="nomebotao">
                    <i class="fa fa-envelope" aria-hidden="true" id="envelope"></i><i class="" id="carregando"></i>
                    </font>
                  </a> -->

                </div>


                <hr>

                <table class="table table-bordered">
                    <thead class="cabecalho-retorno">
                        <tr>
                            <th>CURSO</th>
                            <th class="hidden-xs">PROTOC</th>
                            <th class="hidden-xs hidden-edit">CIDADE</th>
                            <th class="hidden-xs hidden-edit">LOCALIDADE</th>
                            <th>INICIO</th>
                            <th class="hidden-xs">FIM</th>
                            <th class="hidden-xs hidden-edit">INSTRUTOR</th>
                            <th class="hidden-xs">VALOR</th>
                            <th class="hidden-xs">%</th>
                            <th class="hidden-xs">RECEBER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #ffffff;">
                            <td style="vertical-align: middle;"><?=$result['nome_curso'];?></td>
                            <td style="vertical-align: middle;" class="hidden-xs"><?=$result['protocolo'];?></td>
                            <td style="vertical-align: middle;" class="hidden-xs hidden-edit"><?=$result['cidade_treinamento'];?></td>
                            <td style="vertical-align: middle;" class="hidden-xs hidden-edit"><?=$result['localidade'];?></td>
                            <td style="vertical-align: middle;"><?=date('d/m/Y', strtotime($result['data_inicio']));?></td>
                            <td style="vertical-align: middle;" class="hidden-xs"><?=date('d/m/Y', strtotime($result['data_fim']));?></td>
                            <td style="vertical-align: middle;" class="hidden-xs hidden-edit"><?=$result['instrutor']?></td>
                            <td style="vertical-align: middle;" class="hidden-xs">R$ <?=$result['valor_treinamento'];?></td>
                            <td style="vertical-align: middle;" class="hidden-xs"> <?=$result['porcentagem_organizador']?></td>
                            <td style="vertical-align: middle;" class="hidden-xs">R$ <?=$result['receber'];?></td>
                        </tr>
                    </tbody>
                </table>

                    <div class="row">
                        
                        <div class="col-md-3"></div>
                        <div class="col-md-6">

                                

                                <div class="input-group">
                                    <input type="hidden" name="idtr" value="<?=$id;?>">
                                    <select class="form-control" type="text" name="idaluno" id="data" autofocus <?php if($result['status']==1){ echo " "; }else{ echo "disabled"; } ?>>
                                        <option value="">ADICIONAR ALUNO</option>
                                        
                                        <?php while ($aluno = mysqli_fetch_array($query2)) { ?>
                                        
                                            <option value="<?php echo $aluno['idaluno']?>">
                                                <?php echo $aluno['nome_aluno']?>
                                            </option>    
                                        
                                        <?php } ?>
                                    
                                    </select>
                                    <div class="input-group-btn">
                                        <button title="ADICIONAR ALUNO" class="btn btn-success" name="buscar" id="buscar" type="button" <?php if($result['status']==1){ echo " "; }else{ echo "disabled"; } ?>>
                                        <i class="glyphicon glyphicon-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <label id="resultado"></label>

       
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
            var page = "../ajax/cadastrar_aluno_treinamento.php";
            var idtr = $("input[name='idtr']").val();
            $.ajax
                    ({
                        type: 'POST',
                        dataType: 'html',
                        url: page,
                        beforeSend: function () {
                            $("#dados").html("Carregando...");
                        },
                        data: {data: data, idtr: idtr},
                        success: function (msg)
                        {
                            $("#dados").html(msg);
                        }
                    });
        }
                 

        $('#buscar').click(function () {
            buscar($("#data").val())
        });

        function confirmacao2(id){

            swal({
              title: "Tem certeza?",
              // text: "Your will not be able to recover this imaginary file!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Sim, deletar!",
              closeOnConfirm: false
            },
            function(){
              window.location.href='../php/deletar_treinamento.php?idtr=' +id+'';
            });

        }



        window.onload = function(){
            
            document.getElementById("buscar").click();

            let url = window.location;
            let u = new URL(url);
            let valor = u.searchParams.get('editado');
            if(valor == 'true')
              swal('Editado com sucesso!', '', 'success');
            else if(valor == 'false')
              swal('Erro na edição!', '', 'error');


            let valor2 = u.searchParams.get('deletado');
            if(valor2 == 'true')
              swal('Deletado com sucesso!', '', 'success');
            else if(valor2 == 'false')
              swal('Erro ao deletar!', 'Existem alunos cadastrados no treinamento!', 'error');

            let valor3 = u.searchParams.get('alunodeletado');
            if(valor3 == 'true')
              swal('Deletado com sucesso!', '', 'success');
            else if(valor3 == 'false')
              swal('Erro ao deletar!', '', 'error'); 

            let valor4 = u.searchParams.get('finalizado');
            if(valor4 == 'true')
              swal('Finalizado com sucesso!', '', 'success');
            else if(valor4 == 'false')
              swal('Erro ao finalizar!', '', 'error'); 
              
            let valor5 = u.searchParams.get('ativado');
            if(valor5 == 'true')
              swal('Ativado com sucesso!', '', 'success');
            else if(valor5 == 'false')
              swal('Erro ao ativar!', '', 'error');                
        }             
        

        $("select[name='idaluno']").on('change', function(){  
          var idaluno = $("select[name='idaluno']").val();
          var idtr = $("input[name='idtr']").val();
          $.get('../php/verificar_aluno_existente_no_curso.php?data=' + idaluno + '&idtr=' + idtr, function(data){
            $('#resultado').html(data.retorno);
            // var retorno = data.retorno;
            if (data.retorno == '0') {
                document.getElementById('buscar').removeAttribute('disabled', 'true');
                var buscar = document.getElementById('buscar');
                document.getElementById("resultado").innerHTML = " ";
                document.getElementById("resultado").style.color = "red";
            }
            if (data.retorno == '1') {
                document.getElementById('buscar').setAttribute('disabled', 'true');
                var buscar = document.getElementById('buscar');
                document.getElementById("resultado").innerHTML = "ALUNO JÁ CADASTRADO NO TREINAMENTO";
                document.getElementById("resultado").style.color = "red";
            }


            
          },"json");
        });   


        
        $("a[name='email']").on('click', function(){  

            swal({
              title: "Tem certeza?",
              text: "O documento será enviado para o email cadastrado!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-success",
              confirmButtonText: "ENVIAR",
              closeOnConfirm: true
            },
            function(){

                enviaremail();

            });

        }); 



        function enviaremail(){

   
          var idtr = $("input[name='idtr']").val();

          var element = document.getElementById("carregando");
          element.classList.add("fa");
          element.classList.add("fa-spinner");
          element.classList.add("fa-pulse");
          element.classList.add("fa-fw"); 
          document.getElementById("envelope").classList.remove('fa-envelope');

          $.get('../email/enviar_email.php?idtr=' + idtr, function(data){

            $('#nomebotao').html(data.retorno);

            var retorno = data.retorno;

            if (data.retorno == '0') {
                document.getElementById("nomebotao").innerHTML = "NÃO ENVIADO";
                document.getElementById("email").classList.remove('btn-primary');
                document.getElementById("email").classList.add('btn-danger');
            }
            if (data.retorno == '1') {
                document.getElementById("nomebotao").innerHTML = "ENVIADO!";
                document.getElementById("email").classList.remove('btn-primary');
                document.getElementById("email").classList.add('btn-success');
            }
            if (data.retorno == '2') {
                document.getElementById("nomebotao").innerHTML = "SEM INTERNET!";
                document.getElementById("email").classList.remove('btn-primary');
                document.getElementById("email").classList.add('btn-danger');
            }
            if (data.retorno == '3') {
                document.getElementById("nomebotao").innerHTML = "NÚMERO DE ALUNOS INSUFICIENTE!";
                document.getElementById("email").classList.remove('btn-primary');
                document.getElementById("email").classList.add('btn-danger');
            }


            
          },"json");

        }


    </script>  
    </body>
</html>






