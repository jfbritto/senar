<?php
    include('../php/autenticar_sessao.php');
    
    include('../php/config.php');
    $sql = mysqli_query($conexao, "SELECT * FROM usuario") or die(mysqli_error($conexao));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SENAR</title>
        <?php include('../padrao/cabecalho.php');?>



    </head>
    <body>


        <div class="container">
            <div class="row centro">

                <div class="col-xs-0 col-md-4"></div>

                
                <div class="col-xs-12  col-md-4">

                    
                    <div class="modal-content">

                      <div class="modal-header">
                        <h1 class="text-center">ADMINISTRADOR</h1>
                      </div>

                        <center class="modal-body">
                        <div class="btn-group text-center"> 

                          <a type="button" class="btn btn-success" href="cadastrar_usu.php">
                            CADASTRAR
                          </a>


                          <a type="button" class="btn btn-danger" href="deletar_usu.php">
                            DELETAR
                          </a>

                          <a type="button" class="btn btn-info"  onclick="confirmacao();">
                            SAIR
                          </a>

                        </div>
                        </center>
                        
                        <h4 class="text-center">DELETAR USUÁRIO</h4>                       

                      <form method="post" action="php_adm/deletar_usu_bd.php">
                          
                          <div class="modal-body">

                                <label>Usuário:</label> 
                                <select class="form-control" name="idusu" required>
                                    <option value=""></option>
                                    
                                    <?php while ($result = mysqli_fetch_array($sql)) { ?>
                                    
                                        <option value="<?php echo $result['idusuario']?>"><?php echo $result['login'] . " - " . $result['nome_usu']. " - " . $result['nivel']?></option>    
                                    
                                    <?php } ?>
                                    
                                </select>

                          </div>

                          <div class="modal-footer">
                            <p class="text-left"><button class="btn btn-success" >DELETAR</button></p>
                          </div>

                      </form>

                    </div>

                              
                          
                </div>
                


                <div class="col-xs-0 col-md-4"></div>
            
            </div>
        </div>

    <script type="text/javascript">
        window.onload = function(){
            

            let url = window.location;
            let u = new URL(url);
            let valor = u.searchParams.get('deletado');
            if(valor == 'true')
              swal('Deletado com sucesso!', '', 'success');
            else if(valor == 'false')
              swal('Erro ao deletar!', '', 'error');
            
        }    

        function confirmacao(id){

            swal({
              title: "Deseja realmente sair?",
              // text: "Your will not be able to recover this imaginary file!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-success",
              confirmButtonText: "SIM",
              closeOnConfirm: true
            },
            function(){
              window.location.href='../index.php?qbss=true';
            });

        } 

    </script>    
    </body>
</html>


