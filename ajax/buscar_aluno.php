<?php
    include('../php/autenticar_sessao.php');              
    include('../php/config.php');


    $data = $_POST['data'];

    $query = mysqli_query($conexao, "SELECT * FROM aluno WHERE nome_aluno LIKE \"%$data%\" OR cpf LIKE \"$data%\" ORDER BY nome_aluno asc");

    $num = mysqli_num_rows($query);


    ?>
    <section>

        <?php if($num > 0){ ?>

             <table class="table table-hover table-striped table-condensed table-responsive">
              <thead>    
               <tr class="cabecalho-retorno">
                 <th>NOME</th>
                 <th>CPF</th>
                 <th class="hidden-xs">RG</th>
                 <th class="hidden-xs">CEL</th>
                 <th class="hidden-xs">UF</th>
                 <th class="hidden-xs">CIDADE</th>
                 <th class="hidden-xs">NASCIMENTO</th>
                 <th></th>
               </tr>
              </thead>
              <tbody>
          
          <?php while($result = mysqli_fetch_assoc($query)): $idaluno = base64_encode($result['idaluno']);?>
                <tr>
                  <td style="vertical-align: middle;"><?=$result['nome_aluno'];?></td>
                  <td style="vertical-align: middle;"><?=$result['cpf'];?></td>
                  <td class="hidden-xs" style="vertical-align: middle;"><?=$result['rg'];?></td>
                  <td class="hidden-xs" style="vertical-align: middle;"><?=$result['cel'];?></td>
                  <td class="hidden-xs" style="vertical-align: middle;"><?=$result['uf'];?></td>
                  <td class="hidden-xs" style="vertical-align: middle;"><?=$result['cidade'];?></td>
                  <td class="hidden-xs" style="vertical-align: middle;"><?=date('d/m/Y', strtotime($result['data_nascimento']));?></td>
                  <td style="vertical-align: middle;" align="right"><a class="btn btn-success" href="area_aluno.php?idal=<?=$idaluno;?>"  title="AREA DO ALUNO"><i class="glyphicon glyphicon-plus"></i></a></td>
                </tr>      
          
          <?php endwhile ?>

              </tbody> 
             </table>

        <?php }else{ ?>

            <h4 class="text-center" style="color: red">Nao foram encontrados registros.</h4>

        <?php }?>

    </section>

    