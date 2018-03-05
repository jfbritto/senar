<?php
    include('../php/autenticar_sessao.php');              
    include('../php/config.php');


    $data = $_POST['data'];

    $query = mysqli_query($conexao, "SELECT * FROM curso WHERE nome_curso LIKE \"$data%\" ORDER BY nome_curso asc");

    $num = mysqli_num_rows($query);


    ?>
    <section>

        <?php if($num > 0){ ?>

             <table class="table table-hover table-striped table-condensed table-responsive">
              <thead>    
               <tr class="cabecalho-retorno">
                 <th>NOME</th>
                 <th class="hidden-xs">DESCRIÇÃO</th>
                 <th></th>
               </tr>
              </thead>
              <tbody>
          
          <?php while($result = mysqli_fetch_assoc($query)): $idcurso = base64_encode($result['idcurso']);?>
                <tr>
                  <td style="vertical-align: middle;"><?=$result['nome_curso'];?></td>
                  <td class="hidden-xs" style="vertical-align: middle;"><?=$result['descricao'];?></td>
                  <td style="vertical-align: middle;" align="right"><a class="btn btn-warning" href="editar_curso.php?idcu=<?php echo $idcurso; ?>" title="EDITAR CURSO" ><i class="glyphicon glyphicon-pencil"></i></a>

                  <a class="btn btn-danger" onclick='confirmacao(<?php echo $result['idcurso'];?>)' ><i class="glyphicon glyphicon-trash" title="DELETAR CURSO"></i></a></td>
                </tr>      
          
          <?php endwhile ?>

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
              window.location.href='../php/deletar_curso.php?idcu=' +id+'';
            });

        }

</script>