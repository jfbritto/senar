<?php
    include('../php/autenticar_sessao.php');
    
    include('../php/config.php');
    $sql = mysqli_query($conexao, "SELECT idcurso, nome_curso FROM curso") or die(mysqli_error($conexao));
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <title>SENAR - ADD TREINAMENTO</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">
            
            <h2>ADICIONAR TREINAMENTO</h2>
            <a href="treinamentos.php"> TREINAMENTO </a>
            <hr>

                <div class="row">
                    
                    <div class="col-md-12">

                        <div class="panel panel-default">

                            <form method="post" action="../php/cadastrar_treinamento.php" name="novotreinamento">

                            <div class="panel-body">
   
                                <div class="col-md-6">

                                    <label>Curso</label>&nbsp;<label style="color: red;">*</label>
                                    <select class="form-control" type="text" name="curso" autofocus required>
                                        <option value="">-</option>
                                        
                                        <?php while ($result = mysqli_fetch_array($sql)) { ?>
                                        
                                            <option value="<?php echo $result['idcurso']?>"><?php echo $result['nome_curso']?></option>    
                                        
                                        <?php } ?>
                                        
                                    </select>
                                    <br>

                                    <label>Protocolo</label>&nbsp;<label style="color: red;" id="resultado">*</label>
                                    <input class="form-control" type="text" name="protocolo" placeholder="Nº do protocolo" id="numeric" required>
                                    <br>

                                    <label>Instrutor</label>
                                    <input class="form-control" type="text" name="instrutor" placeholder="Nome do instrutor">
                                    <br>

                                    <label>Cidade</label>
                                    <input class="form-control" type="text" name="cidade" placeholder="Nome da cidade">
                                    <br>

                                    <label>Localidade</label>
                                    <input class="form-control" type="text" name="localidade" placeholder="Bairro, comunidade, vila...">
                                    <br>

                                </div>

                                <div class="col-md-6">

                                    <label>Data inicial</label>&nbsp;<label style="color: red;">*</label>
                                    <input class="form-control" type="date" name="data_inicio" required>
                                    <br>

                                    <label>Data final</label>&nbsp;<label style="color: red;">*</label>
                                    <input class="form-control" type="date" name="data_fim" required>
                                    <br>

                                    <label>Valor</label>
                                    <input class="form-control" type="text" name="valor" id="valor" placeholder="R$ ">
                                    <br>

                                    <label>Porcentagem</label>
                                    <input class="form-control" type="text" name="porcentagem" placeholder="%" id="numeric2" maxlength="4">
                                    <br>
                                    

                                </div>
    
                                <div class="col-md-12 text-center">
                                    <p>
                                        <a class="btn btn-danger" href="treinamentos.php">CANCELAR</a>
                                        <button class="btn btn-success" id="cadastrar">CADASTRAR</button>
                                    </p>
                                </div> 
                            
                            </div>
                        
                            </form>

                        </div>    
                    </div>

                </div>

            </div>

        </div>
        
    <footer></footer>    


    <script type="text/javascript">

        $(function(){
         $("#valor").maskMoney({symbol:'R$ ', 
        showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
         })

        
        window.onload = function(){
            

            let url = window.location;
            let u = new URL(url);
            let valor = u.searchParams.get('cadastrado');
            if(valor == 'true')
              swal('Cadastrado com sucesso!', '', 'success');
            else if(valor == 'false')
              swal('Erro no cadastro!', '', 'error');

        }           

                //verifica se o protocolo já esta cadastrado no banco    
        $("input[name='protocolo']").on('keyup', function(){  
          var protocolo = $(this).val();
          $.get('../php/verificar_protocolo_existente.php?protocolo=' + protocolo, function(data){
            $('#resultado').html(data.retorno);
            // var retorno = data.retorno;
            if (data.retorno == '0') {
                document.getElementById('cadastrar').removeAttribute('disabled', 'true');
                var cadastrar = document.getElementById('cadastrar');
                document.getElementById("resultado").innerHTML = "*";
                document.getElementById("resultado").style.color = "red";
            }
            
            if (data.retorno == '1') {
                document.getElementById('cadastrar').setAttribute('disabled', 'true');
                var cadastrar = document.getElementById('cadastrar');
                document.getElementById("resultado").innerHTML = "    PROTOCOLO JÁ CADASTRADO";
                document.getElementById("resultado").style.color = "red";
            }

            
          },"json");
        });    


         $('#numeric').keyup(function() {
          $(this).val(this.value.replace(/\D/g, ''));
        });
         $('#numeric2').keyup(function() {
          $(this).val(this.value.replace(/\D/g, ''));
        });
    </script>
    </body>
</html>