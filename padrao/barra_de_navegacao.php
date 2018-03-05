        <!--barra de navegação-->
      <nav class="navbar navbar-default navbar-transparent bar">
        <div class="container">
          
          <!-- header -->
          <div class="navbar-header">
            

            <!-- botao toggle -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
              <span class="sr-only">alternar navegação</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a href="index.php" class="navbar-brand">
              <span class="img-logo">Senar</span>
              <!-- <label style="font-family: times; color: #005826">SENAR - ES</label> -->
            </a>

          </div>

          <!-- navbar -->
          <div class="collapse navbar-collapse" id="barra-navegacao">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="cursos.php">CURSO</a></li>
              <li><a href="treinamentos.php">TREINAMENTO</a></li>
              <li><a href="alunos.php">ALUNO</a></li>
              <li><a href="#" onclick="fechar();">SAIR</a></li>
            </ul>
          </div>

        </div><!-- container -->
      </nav><!-- nav -->

      <script type="text/javascript">

        function fechar(id){

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