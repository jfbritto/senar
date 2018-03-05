<?php
    include('../php/autenticar_sessao.php');              
    $fktreinamento = $_SESSION['fktreinamento'];
    
    include('../php/config.php');




    if (isset($_POST['data']) && !empty($_POST['data'])) {
      
      $data = $_POST['data'];
      $idtr = $_POST['idtr'];

      $query2 = mysqli_query($conexao, "SELECT * FROM participou WHERE fkaluno = '{$data}' AND fktreinamento = '{$idtr}'")or die(mysqli_error($conexao)); 
      $numero = mysqli_fetch_array($query2);

      if ($numero>0) {
        
          $query1 = mysqli_query($conexao, "SELECT * FROM participou p 
                                           JOIN aluno a ON a.idaluno = p.fkaluno
                                           JOIN treinamento t ON t.idtreinamento = p.fktreinamento
                                           JOIN curso c ON c.idcurso = t.fkcurso
                                           WHERE p.fktreinamento = $fktreinamento");
          $num = mysqli_num_rows($query1);
      }else{

        $query3 = mysqli_query($conexao, "INSERT INTO participou(fktreinamento, fkaluno) VALUES('$fktreinamento', '$data')");

      }
    }

    
  
    $query1 = mysqli_query($conexao, "SELECT * FROM participou p 
                                     JOIN aluno a ON a.idaluno = p.fkaluno
                                     JOIN treinamento t ON t.idtreinamento = p.fktreinamento
                                     JOIN curso c ON c.idcurso = t.fkcurso
                                     WHERE p.fktreinamento = $fktreinamento
                                     ORDER BY nome_aluno ASC");
    $num = mysqli_num_rows($query1);
    


    ?>
    <section>

        <?php if($num > 0){ $cont=1;?>

             <table class="table table-hover table-striped table-condensed table-responsive">
              <thead>    
               <tr class="cabecalho-retorno">
                 <th></th>
                 <th>ALUNO</th>
                 <th class="hidden-xs">CPF</th>
                 <th class="hidden-xs hidden-edit">RG</th>
                 <th class="hidden-xs">CEL</th>
                 <th class="hidden-xs">UF</th>
                 <th class="hidden-xs hidden-edit">CIDADE</th>
                 <th class="hidden-xs hidden-edit">NASCIMENTO</th>
                 <th></th>
                 <th style="text-align: right;">CERTIFICADO</th>
               </tr>
              </thead>
              <tbody>
          
          <?php while($result = mysqli_fetch_assoc($query1)): ?>
                <tr class="tr_<?= $result['idaluno']; ?>">
                  <td style="vertical-align: middle;"><?=$cont;?></td>
                  <td style="vertical-align: middle;"><?=$result['nome_aluno'];?></td>
                  <td class="hidden-xs" style="vertical-align: middle;"><?=$result['cpf'];?></td>
                  <td class="hidden-xs hidden-edit" style="vertical-align: middle;"><?=$result['rg'];?></td>
                  <td class="hidden-xs" style="vertical-align: middle;"><?=$result['cel'];?></td>
                  <td class="hidden-xs" style="vertical-align: middle;"><?=$result['uf'];?></td>
                  <td class="hidden-xs hidden-edit" style="vertical-align: middle;"><?=$result['cidade'];?></td>
                  <td class="hidden-xs hidden-edit" style="vertical-align: middle;"><?=date('d/m/Y', strtotime($result['data_nascimento']));?></td>

                  <td align="right"><a class="btn btn-danger" onclick='confirmacao(<?php echo $result['idaluno'];?>)' title="DELETAR ALUNO DO TREINAMENTO"><i class="glyphicon glyphicon-trash"></i></a></td>

                  <?php if($result['certificado']==1){ ?>

                    <td align="right" style="vertical-align: middle;">ENTREGUE</td>

                  <?php }else{ ?>

                    <td align="right"><a class="btn btn-success" onclick='certificado(<?php echo $result['idaluno'];?>)' title="ENTREGAR CERTIFICADO"><i class="glyphicon glyphicon-ok"></i></a></td>

                  <?php } ?>

                </tr>      
          
          <?php $cont++; endwhile ?>

              </tbody> 
             </table>

        <?php }else{ ?>

            <h4 class="text-center" style="color: red">Nao foram encontrados registros.</h4>

        <?php }?>

    </section>

<script type="text/javascript">



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
              window.location.href='../php/deletar_aluno_treinamento.php?fkal=' +id+'';
            });

        }


        function certificado(id){

            swal({
              title: "O certificado foi entregue?",
              // text: "Your will not be able to recover this imaginary file!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-success",
              confirmButtonText: "Sim",
              closeOnConfirm: false
            },
            function(){
              window.location.href='../php/entregar_certificado_aluno.php?certificado=1&fkal=' +id+'';
            });

        }


        
</script>    
