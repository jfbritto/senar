<?php
    include('../php/autenticar_sessao.php');
    
    if(isset($_GET['atv'])){$atv=$_GET['atv'];}else{$atv = 1;}
    

    include('../php/config.php');
    $id = base64_decode($_GET['idal']);
    $query = mysqli_query($conexao, "SELECT * FROM aluno WHERE idaluno = $id") or die(mysqli_error($conexao));
    $result = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <title>SENAR - AREA ALUNO</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">
            
            <h2><?php echo ($atv == 1 ? '' : '<label style="color:#F0AD4E;">EDITANDO</label> ') ?><?=$result['nome_aluno'];?></h2>
            <a href="pesquisar_aluno.php" class="<?php echo ($atv == 1 ? '' : 'apagar') ?>"> PESQUISAR ALUNO </a>
            <hr class=" <?php echo ($atv !== 1 ? 'apagar' : 'visivel') ?>">

            <div class="btn-group <?php echo ($atv == 1 ? '' : 'apagar') ?>"> 
              
              <a type="button" class="btn btn-danger" onclick="confirmacao(<?php echo $id;?>)" title="EXCLUIR ALUNO">
                <i class="glyphicon glyphicon-trash"></i>
              </a>

              <a type="button" class="btn btn-warning" href="area_aluno.php?idal=<?=$_GET['idal'];?>&atv=0" title="EDITAR ALUNO">
                <i class="fa fa-pencil" aria-hidden="true"></i>
              </a>


            </div> 

              

                      
            <hr>    

            <form method="POST" action="../php/editar_aluno_bd.php" name="novoaluno">

                <div class="row">
                    
                    <div class="col-md-12">

                        <div class="panel panel-default">

                            <div class="panel-body">
                            

                                <div class="col-md-4">

                                    <label>Nome</label><label style="color: red;">*</label>
                                    <input class="form-control" type="text" name="nome" value="<?=$result['nome_aluno'];?>" required <?php echo ($atv == 1 ? 'disabled' : '') ?> autofocus>
                                    <br>

                                    <label>CPF</label><label style="color: red;">*</label>
                                    <input class="form-control" type="text" name="cpf" minlength="11" maxlength="11" value="<?=$result['cpf'];?>" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                    <br>

                                    <label>RG</label>
                                    <input class="form-control" type="text" name="rg" minlength="7" maxlength="7" value="<?=$result['rg'];?>" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                    <br>

                                    <label>Nascimento</label><label style="color: red;">*</label>
                                    <input class="form-control" type="date" name="data_nascimento" value="<?=$result['data_nascimento'];?>" required <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                    <br>

                                    <label>Tel. Residencial</label>
                                    <input class="form-control" type="" name="tel" value="<?=$result['tel'];?>" onkeypress="mascaraTelefone(this)" onkeypress="(this);" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                    <br>

                                    <label>Cel</label>
                                    <input class="form-control" type="" name="cel" value="<?=$result['cel'];?>" onkeypress="mascaraTelefone(this)" onkeypress="(this);" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                    <br>


                                </div>

                                <div class="col-md-4">

                                    <label>UF</label>
                                    <select class="form-control" type="text" name="uf" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                        <option value="<?=$result['uf'];?>"><?=$result['uf'];?></option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
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
                                    <input class="form-control" type="text" name="cidade" value="<?=$result['cidade'];?>" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                    <br>
                                    
                                    <label>Já participou?</label>
                                    <select class="form-control" type="text" name="participou" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                        <option value="<?=$result['ja_participou'];?>"><?=$result['ja_participou'];?></option>
                                        <option value="SIM">SIM</option>
                                        <option value="NÃO">NÃO</option>
                                    </select>
                                    <br>

                                    <label>Escolaridade</label>
                                    <select class="form-control" type="text" name="escolaridade" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                        <option value="<?=$result['escolaridade'];?>"><?=$result['escolaridade'];?></option>
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
                                    <select class="form-control" type="text" name="etnia" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                        <option value="<?=$result['etnia'];?>"><?=$result['etnia'];?></option>
                                        <option value="BRANCA">BRANCA</option>
                                        <option value="PRETA">PRETA</option>
                                        <option value="PARDA">PARDA</option>
                                        <option value="AMARELA">AMARELA</option>
                                        <option value="INDÍGENA">INDÍGENA</option>
                                        <option value="NÃO DECLARADA">NÃO DECLARADA</option>
                                    </select>
                                    <br>

                                    <label>Sexo</label>
                                    <select class="form-control" type="text" name="sexo" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                        <option value="<?=$result['sexo'];?>"><?=$result['sexo'];?></option>
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="FEMININO">FEMININO</option>
                                        <option value="NÃO DECLARADO">NÃO DECLARADO</option>
                                    </select>
                                    <br>


                                </div>

                                <div class="col-md-4">
               
                                    <label>Situação participante</label>
                                    <select class="form-control" type="text" name="situacao" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                        <option value="<?=$result['situacao'];?>"><?=$result['situacao'];?></option>
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
                                    <select class="form-control" type="text" name="deficiencia_tem" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                        <option value="<?=$result['qual_deficiencia'];?>"><?=$result['tem_deficiencia'];?></option>
                                        <option value="SIM">SIM</option>
                                        <option value="NÃO">NÃO</option>
                                        <option value="NÃO DECLARADO">NÃO DECLARADO</option>
                                    </select>
                                    <br>

                                    <label>Qual?</label>
                                    <input class="form-control" type="text" name="deficiencia_qual" value="<?=$result['qual_deficiencia'];?>" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                    <br>

                                    <label>Renda</label>
                                    <select class="form-control" type="text" name="renda" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                        <option value="<?=$result['renda'];?>"><?=$result['renda'];?></option>
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
                                    <select class="form-control" type="text" name="estado_civil" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                        <option value="<?=$result['estado_civil'];?>"><?=$result['estado_civil'];?></option>
                                        <option value="CASADO(A)">CASADO(A)</option>
                                        <option value="SOLTEIRO(A)">SOLTEIRO(A)</option>
                                        <option value="DIVORCIADO(A)">DIVORCIADO(A)</option>
                                        <option value="VIÚVO(A)">VIÚVO(A)</option>
                                        <option value="OUTROS">OUTROS</option>
                                    </select>
                                    <br>

                                    <label>Nº de filhos</label>
                                    <input class="form-control" type="number" name="filhos" max="50" value="<?=$result['filhos'];?>" <?php echo ($atv == 1 ? 'disabled' : '') ?>>
                                    <br>
                                

                                </div>        

                                <input type="hidden" name="idal" value="<?=$_GET['idal'];?>">

                                <div class="col-md-12 text-center">
                                    <p>
                                        <a type="button" class="btn btn-danger <?php echo ($atv == 1 ? 'invisivel' : 'visivel') ?>" href="area_aluno.php?idal=<?=$_GET['idal'];?>">CANCELAR</a>
                                        <button class="btn btn-warning <?php echo ($atv == 1 ? 'invisivel' : 'visivel') ?>">EDITAR</button>
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
            let valor = u.searchParams.get('editado');
            if(valor == 'true')
              swal('Editado com sucesso!', '', 'success');
            else if(valor == 'false')
              swal('Erro na edição!', '', 'error');


            let valor2 = u.searchParams.get('deletado');
            if(valor2 == 'true')
              swal('Deletado com sucesso!', '', 'success');
            else if(valor2 == 'false')
              swal('Erro ao deletar!', 'Aluno cadastrado em treinamentos!', 'error');
         
        }          

        function confirmacao(id){

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
              window.location.href='../php/deletar_aluno.php?idal=' +id+'';
            });

        }

    </script>  
    </body>
</html>