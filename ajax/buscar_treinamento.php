<?php
    include('../php/autenticar_sessao.php');
    $data1 = 0;
    $data2 = 0;
    include('../php/config.php');


    $data = $_POST['data'];

    $query = mysqli_query($conexao, "SELECT * FROM treinamento t
                                     JOIN curso c ON c.idcurso = t.fkcurso 
                                     WHERE nome_curso LIKE \"$data%\" OR protocolo LIKE \"$data%\"
                                     ORDER BY status desc");

  

    $num = mysqli_num_rows($query);


    ?>
    <section>

        <?php if($num > 0){ $cont=1;?>

             <table class="table table-condensed table-responsive table-corpo">
              <thead>    
               <tr class="cabecalho-retorno">
                 <th></th> 
                 <th>CURSO</th>
                 <th class="hidden-xs">PROTOCOLO</th>
                 <th class="hidden-xs">CIDADE</th>
                 <th class="hidden-xs">LOCALIDADE</th>
                 <th>INICIO</th>
                 <th class="hidden-xs">FIM</th>
                 <th></th>
               </tr>
              </thead>
              <tbody>
          
          <?php while($result = mysqli_fetch_assoc($query)): $idtreinamento = base64_encode($result['idtreinamento']); ?>


                <tr class=" destaque-td <?php if($result['status']==1){echo "verde";}else{echo "cinza";}?>">
                  <td style="vertical-align: middle;"><?php echo $cont;?></td>
                  <td style="vertical-align: middle;"><?=$result['nome_curso'];?></td>
                  <td style="vertical-align: middle;" class="hidden-xs"><?=$result['protocolo'];?></td>
                  <td style="vertical-align: middle;" class="hidden-xs"><?=$result['cidade_treinamento'];?></td>
                  <td style="vertical-align: middle;" class="hidden-xs"><?=$result['localidade'];?></td>
                  <td style="vertical-align: middle;"><?=date('d/m/Y', strtotime($result['data_inicio']));?></td>
                  <td style="vertical-align: middle;" class="hidden-xs"><?=date('d/m/Y', strtotime($result['data_fim']));?></td>
                  <td style="vertical-align: middle;" align="right"><a class="btn btn-success" href="area_treinamento.php?idtr=<?=$idtreinamento;?>"  title="AREA DO TREINAMENTO"><i class="glyphicon glyphicon-plus"></i></a></td>
                </tr>      
          
          <?php $cont++; endwhile ?>

              </tbody> 
             </table>

        <?php }else{ ?>

            <h4 class="text-center" style="color: red">Nao foram encontrados registros.</h4>

        <?php }?>

    </section>

