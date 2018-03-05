<?php
session_start();
if (isset($_GET['qbss'])) {
  $_SESSION = array();
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SENAR</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/estilo.css">
        <link rel="icon" href="img/logo.png">

        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/sweetalert.min.js"></script>



    </head>
    <body>


        <div class="container">
            <div class="row centro">
                
                <div class="col-xs-10 col-xs-offset-1  col-md-4 col-md-offset-4 ">
                    
                    <div class="modal-content text-center">

                      <div class="modal-header">
                        <div class="loginlogo">
                          <div align="center" class="logo"><img class="img-logo-login" src="img/logo.png"></div>
                        </div>
                      </div>

                      <form method="post" action="php/autenticar_usu.php">
                          
                          <div class="modal-body">
                            
                            
                              <label id="incorreto"></label>
                              <div class="form-inline has-feedback" id="erro"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" name="login" required autofocus>
                                  </div>
                              </div>
                             

                              <label id="incorreto2"></label>
                              <div class="form-inline has-feedback" id="erro2"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                   <input type="password" class="form-control" name="senha" required>
                                  </div>
                              </div>

                            

                          </div>

                          <div class="modal-footer">
                            <p class="text-center"><button class="btn btn-success btn-jf" >ENTRAR</button></p>
                          </div>

                      </form>

                    </div>
                          
                    <br><br><br>

                    <center>
                      <label style="color: white">Desenvolvido por <a target="blank" class="btn btn-xs btn-success" href="https://www.facebook.com/joaofilipi.britto">jfbritto</a></label>
                    </center>
                
                </div>

                
            
            </div>
        </div>
    <script type="text/javascript">
        window.onload = function(){
            

            let url = window.location;
            let u = new URL(url);
            let valor = u.searchParams.get('naologado');
            if(valor == 'true')
              swal('Não logado!', 'Por favor, insira suas credenciais!', 'warning');


            let valor2 = u.searchParams.get('senhaincorreta');
            if(valor2 == 'true'){
              // swal('Erro!', 'Login ou senha incorretos!', 'warning');
              // document.getElementById("incorreto").innerHTML = "INCORRETO";
              // document.getElementById("incorreto2").innerHTML = "INCORRETO";
              // document.getElementById("incorreto").style.color = "red";
              // document.getElementById("incorreto2").style.color = "red";
              document.getElementById("erro").classList.add('has-error');
              document.getElementById("erro2").classList.add('has-error');
              }
            // let valor3 = u.searchParams.get('qbss');
            // if(valor3 == 'true')
            //   location.reload();
            //   return;

         
        }              
    </script>    
    </body>
</html>

