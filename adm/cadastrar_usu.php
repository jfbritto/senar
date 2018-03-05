<?php include('../php/autenticar_sessao.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>SENAR</title>
        <?php include('../padrao/cabecalho.php');?>
        <meta charset="utf-8">



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
                        
                        <h4 class="text-center">CADASTRAR USUÁRIO</h4>                       

                      <form method="post" action="php_adm/cadastrar_usu_bd.php">
                          
                          <div class="modal-body">

                            <label>Nome:</label>  
                            <input type="text" class="form-control" name="nome" required autofocus>

                            <br>

                            <label>Email:</label> 
                            <input type="email" class="form-control" name="email" required>

                            <br>

                            <label>Login:</label>  <label id="resultado" ></label>
                            <input type="text" class="form-control" name="login" required>

                            <br>

                            <label>Senha:</label> 
                            <input type="password" class="form-control" name="senha" required>

                            <br>

                            <label>Nível:</label> 
                            <select class="form-control" name="nivel" required>
                                <option value="1">BÁSICO</option>
                                <option value="2">ADMINISTRADOR</option>
                            </select>

                          </div>

                          <div class="modal-footer">
                            <p class="text-left"><button class="btn btn-success" id="cadastrar">CADASTRAR</button></p>
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
            let valor = u.searchParams.get('cadastrado');
            if(valor == 'true')
              swal('Cadastrado com sucesso!', '', 'success');
            else if(valor == 'false')
              swal('Erro no cadastro!', '', 'error');

            let valor2 = u.searchParams.get('entrou');
            if(valor2 == 'true')
              swal({
                title: "Bem vindo!",
                // text: "Here's a custom image.",
                imageUrl: '../img/britto.jpg'
              });
         
        }         

        //verifica se o usuario já esta cadastrado no banco    
        $("input[name='login']").on('keyup', function(){  
          var login = $(this).val();
          $.get('php_adm/verificar_usu_existente.php?loginusu=' + login, function(data){
            $('#resultado').html(data.retorno);
            // var retorno = data.retorno;
            if (data.retorno == '0') {
                document.getElementById('cadastrar').removeAttribute('disabled', 'true');
                var cadastrar = document.getElementById('cadastrar');
                document.getElementById("resultado").innerHTML = " ";
                document.getElementById("resultado").style.color = "red";
            }
            
            if (data.retorno == '1') {
                document.getElementById('cadastrar').setAttribute('disabled', 'true');
                var cadastrar = document.getElementById('cadastrar');
                document.getElementById("resultado").innerHTML = "USUÁRIO JÁ CADASTRADO";
                document.getElementById("resultado").style.color = "red";
            }


            
          },"json");
        });        


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


