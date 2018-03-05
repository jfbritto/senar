<?php include('../php/autenticar_sessao.php');?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <title>SENAR - ADD ALUNO</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">
            
            <h2>ADICIONAR ALUNO</h2>
            <a href="alunos.php"> ALUNO </a>
            <hr>

            <form method="POST" action="../php/cadastrar_aluno.php" name="novoaluno">

                <div class="row">
                    
                    <div class="col-md-12">

                        <div class="panel panel-default">

                            <div class="panel-body">
                            

                                <div class="col-md-4">

                                    <label>Nome</label>&nbsp;<label style="color: red;">*</label>
                                    <input class="form-control" type="text" name="nome" placeholder="Nome completo" autofocus required>
                                    <br>

                                    <label>CPF</label>&nbsp;<label style="color: red;" id="resultado">*</label>
                                    <input class="form-control" type="text" name="cpf" id="cpf" minlength="11" maxlength="11" placeholder="Digite sem pontuação" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                                    <br>

                                    <label>RG</label>
                                    <input class="form-control" type="text" name="rg" minlength="7" maxlength="7" placeholder="Digite sem pontuação" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                                    <br>

                                    <label>Nascimento</label>&nbsp;<label style="color: red;">*</label>
                                    <input class="form-control" type="date" name="data_nascimento" required>
                                    <br>

                                    <label>Tel. Residencial</label>
                                    <input class="form-control" type="" name="tel" placeholder="(xx) xxxx-xxxx" onkeypress="mascaraTelefone(this)" onkeypress="(this);">
                                    <br>

                                    <label>Cel</label>
                                    <input class="form-control" type="" name="cel" placeholder="(xx) xxxxx-xxxx" onkeypress="mascaraTelefone(this)" onkeypress="(this);">
                                    <br>


                                </div>

                                <div class="col-md-4">

                                    <label>UF</label>
                                    <select class="form-control" type="text" name="uf">
                                        <option value="ES">Espírito Santo</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                    <br>

                                    <label>Cidade</label>
                                    <input class="form-control" type="text" name="cidade">
                                    <br>
                                    
                                    <label>Já participou?</label>
                                    <select class="form-control" type="text" name="participou">
                                        <option value="">-</option>
                                        <option value="SIM">SIM</option>
                                        <option value="NÃO">NÃO</option>
                                    </select>
                                    <br>

                                    <label>Escolaridade</label>
                                    <select class="form-control" type="text" name="escolaridade">
                                        <option value="">-</option>
                                        <option value="SEM ESCOLARIDADE">SEM ESCOLARIDADE</option>
                                        <option value="ENSINO FUNDAMENTAL INCOMPLETO">ENSINO FUNDAMENTAL INCOMPLETO</option>
                                        <option value="ENSINO FUNDAMENTAL COMPLETO">ENSINO FUNDAMENTAL COMPLETO</option>
                                        <option value="ENSINO MÉDIO INCOMPLETO">ENSINO MÉDIO INCOMPLETO</option>
                                        <option value="ENSINO MÉDIO COMPLETO">ENSINO MÉDIO COMPLETO</option>
                                        <option value="ENSINO TÉCNICO INCOMPLETO">ENSINO TÉCNICO INCOMPLETO</option>
                                        <option value="ENSINO TÉCNICO COMPLETO">ENSINO TÉCNICO COMPLETO</option>
                                        <option value="ENSINO SUPERIOR INCOMPLETO">ENSINO SUPERIOR INCOMPLETO</option>
                                        <option value="ENSINO SUPERIOR COMPLETO">ENSINO SUPERIOR COMPLETO</option>
                                        <option value="PÓS-GRADUAÇÃO INCOMPLETO">PÓS-GRADUAÇÃO INCOMPLETO</option>
                                        <option value="PÓS-GRADUAÇÃO COMPLETO">PÓS-GRADUAÇÃO COMPLETO</option>
                                        <option value="MESTRADO">MESTRADO</option>
                                        <option value="DOUTORADO">DOUTORADO</option>
                                        <option value="NÃO DECLARADA">NÃO DECLARADA</option>
                                    </select>
                                    <br>

                                    <label>Etnia</label>
                                    <select class="form-control" type="text" name="etnia">
                                        <option value="">-</option>
                                        <option value="BRANCA">BRANCA</option>
                                        <option value="PRETA">PRETA</option>
                                        <option value="PARDA">PARDA</option>
                                        <option value="AMARELA">AMARELA</option>
                                        <option value="INDÍGENA">INDÍGENA</option>
                                        <option value="NÃO DECLARADA">NÃO DECLARADA</option>
                                    </select>
                                    <br>

                                    <label>Sexo</label>
                                    <select class="form-control" type="text" name="sexo">
                                        <option value="">-</option>
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="FEMININO">FEMININO</option>
                                        <option value="NÃO DECLARADO">NÃO DECLARADO</option>
                                    </select>
                                    <br>


                                </div>

                                <div class="col-md-4">
               
                                    <label>Situação participante</label>
                                    <select class="form-control" type="text" name="situacao">
                                        <option value="">-</option>
                                        <option value="DESEMPREGADO/DESOCUPADO">DESEMPREGADO/DESOCUPADO</option>
                                        <option value="COOPERADO">COOPERADO</option>
                                        <option value="PROFISSIONAL LIBERAL">PROFISSIONAL LIBERAL</option>
                                        <option value="APOSENTADO">APOSENTADO</option>
                                        <option value="AUTÔNOMO">AUTÔNOMO</option>
                                        <option value="PRODUTOR RURAL EM REGIME DE AGRICULTURA FAMILIAR">PRODUTOR RURAL EM REGIME DE AGRICULTURA FAMILIAR</option>
                                        <option value="PRODUTOR ARRENDATÁRIO">PRODUTOR ARRENDATÁRIO</option>
                                        <option value="PRODUTOR EMPREGADOR">PRODUTOR EMPREGADOR</option>
                                        <option value="FAMÍLIA DO PRODUTOR RURAL">FAMÍLIA DO PRODUTOR RURAL</option>
                                        <option value="EMPREGADO/OCUPADO TEMPORÁRIO">EMPREGADO/OCUPADO TEMPORÁRIO</option>
                                        <option value="EMPREGADO/OCUPADO PERMANENTE">EMPREGADO/OCUPADO PERMANENTE</option>
                                        <option value="ASSOCIADO">ASSOCIADO</option>
                                        <option value="DETENTO/EGRESSO DO SIST. PENAL/EGRESSO DE INT. SÓCIO-EDUCATIVA">DETENTO/EGRESSO DO SIST. PENAL/EGRESSO DE INT. SÓCIO-EDUCATIVA</option>
                                        <option value="1º EMPREGO">1º EMPREGO</option>
                                        <option value="OUTRA">OUTRA</option>
                                        <option value="NÃO INFORMADO">NÃO INFORMADO</option>
                                    </select>
                                    <br>

                                    <label>Deficiência</label>
                                    <select class="form-control" type="text" name="deficiencia_tem">
                                        <option value="">-</option>
                                        <option value="SIM">SIM</option>
                                        <option value="NÃO">NÃO</option>
                                        <option value="NÃO DECLARADO">NÃO DECLARADO</option>
                                    </select>
                                    <br>

                                    <label>Qual?</label>
                                    <input class="form-control" type="text" name="deficiencia_qual">
                                    <br>

                                    <label>Renda</label>
                                    <select class="form-control" type="text" name="renda">
                                        <option value="">-</option>
                                        <option value="NÃO DECLARADA">NÃO DECLARADA</option>
                                        <option value="ATÉ 1/2 SM">ATÉ 1/2 SM</option>
                                        <option value="+ 1/2 SM À 1 SM">+ 1/2 SM À 1 SM</option>
                                        <option value="+ 1 SM À 3 SM">+ 1 SM À 3 SM</option>
                                        <option value="+ 3 SM À 5 SM">+ 3 SM À 5 SM</option>
                                        <option value="+ 5 SM À 10 SM">+ 5 SM À 10 SM</option>
                                        <option value="+ 10 SM">+ 10 SM</option>
                                    </select>
                                    <br>

                                    <label>Estado Civil</label>
                                    <select class="form-control" type="text" name="estado_civil">
                                        <option value="">-</option>
                                        <option value="CASADO(A)">CASADO(A)</option>
                                        <option value="SOLTEIRO(A)">SOLTEIRO(A)</option>
                                        <option value="DIVORCIADO(A)">DIVORCIADO(A)</option>
                                        <option value="VIÚVO(A)">VIÚVO(A)</option>
                                        <option value="OUTROS">OUTROS</option>
                                    </select>
                                    <br>

                                    <label>Nº de filhos</label>
                                    <input class="form-control" type="number" name="filhos" min="0" max="50">
                                    <br>
                                

                                </div>        

                                <div class="col-md-12 text-center">
                                    <p>
                                        <a class="btn btn-danger" href="alunos.php">CANCELAR</a>
                                        <button class="btn btn-success" id="cadastrar">CADASTRAR</button>
                                    </p>
                                </div> 

                            </div>
                        </div> 
                    </div>

                </div>

            </div>

            </form>
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

        // //verifica se o CPF já esta cadastrado no banco    
        // $("input[name='cpf']").on('keyup', function(){  
        //   var cpf = $(this).val();
        //   $.get('../php/verificar_cpf_existente.php?cpf=' + cpf, function(data){
        //     $('#resultado').html(data);
        //   });
        // });

        //verifica se o CPF já esta cadastrado no banco    
        $("input[name='cpf']").on('keyup', function(){  
          var cpf = $(this).val();
          $.get('../php/verificar_cpf_existente.php?cpf=' + cpf, function(data){
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
                document.getElementById("resultado").innerHTML = "CPF JÁ CADASTRADO";
                document.getElementById("resultado").style.color = "red";
            }

            if (data.retorno == '2') {
                document.getElementById('cadastrar').setAttribute('disabled', 'true');
                var cadastrar = document.getElementById('cadastrar');
                document.getElementById("resultado").innerHTML = "CPF INVÁLIDO";
                document.getElementById("resultado").style.color = "red";
            }


            if (data.retorno == '3') {
                document.getElementById('cadastrar').removeAttribute('disabled', 'true');
                var cadastrar = document.getElementById('cadastrar');
                document.getElementById("resultado").innerHTML = "CPF VÁLIDO";
                document.getElementById("resultado").style.color = "green";
            }



            
          },"json");
        });        

    </script>    
    </body>
</html>