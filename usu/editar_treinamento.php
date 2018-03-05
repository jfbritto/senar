<?php
    include('../php/autenticar_sessao.php');
    
    include('../php/config.php');

    $idtreinamento = base64_decode($_GET['idtr']);

    $query = mysqli_query($conexao, "SELECT * FROM treinamento t JOIN curso c ON c.idcurso = t.fkcurso WHERE t.idtreinamento = $idtreinamento")or die(mysqli_error($conexao));
    $result = mysqli_fetch_array($query);

    $query2 = mysqli_query($conexao, "SELECT * FROM curso")or die(mysqli_error($conexao));
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <title>SENAR - EDITAR TREINAMENTO</title>
        <?php include('../padrao/cabecalho.php');?>

    </head>
    <body>

    <?php include('../padrao/barra_de_navegacao.php');?>


        <div class="container">

            <div class="jumbotron">
            
            <h2>EDITAR TREINAMENTO</h2>
            <a href="area_treinamento.php?idtr=<?=$_GET['idtr']?>"> <?php echo $result['nome_curso']?> </a>
            <hr>

                <div class="row">
                    
                    <div class="col-md-12">

                        <div class="panel panel-default">

                            <form method="post" action="../php/editar_treinamento_bd.php">

                            <div class="panel-body">
   
                                <div class="col-md-6">

                                    <label>Curso</label><label style="color: red;">*</label>
                                    <select class="form-control" type="text" name="curso" autofocus>
                                        <option value="<?=$result['idcurso']?>"><?=$result['nome_curso']?></option>
                                        
                                        <?php while ($result2 = mysqli_fetch_array($query2)) { ?>
                                        
                                            <option value="<?=$result2['idcurso']?>"><?=$result2['nome_curso']?></option>    
                                        
                                        <?php } ?>
                                        
                                    </select>
                                    <br>

                                    <label>Protocolo</label><label style="color: red;">*</label>
                                    <input class="form-control" type="text" name="protocolo" value="<?=$result['protocolo']?>">
                                    <br>

                                    <label>Instrutor</label>
                                    <input class="form-control" type="text" name="instrutor" value="<?=$result['instrutor']?>">
                                    <br>

                                    <label>Cidade</label>
                                    <input class="form-control" type="text" name="cidade" value="<?=$result['cidade_treinamento']?>">
                                    <br>

                                </div>

                                <div class="col-md-6">

                                    <label>Localidade</label>
                                    <input class="form-control" type="text" name="localidade" value="<?=$result['localidade']?>">
                                    <br>

                                    <label>Data inicial</label><label style="color: red;">*</label>
                                    <input class="form-control" type="date" name="data_inicio" value="<?=$result['data_inicio']?>">
                                    <br>

                                    <label>Data final</label><label style="color: red;">*</label>
                                    <input class="form-control" type="date" name="data_fim" value="<?=$result['data_fim']?>">
                                    <br>
                                    
                                    <input type="hidden" name="idtreinamento" value="<?=$result['idtreinamento']?>">
                                    <input type="hidden" name="idtr" value="<?=$_GET['idtr']?>">

                                </div>
    
                                <div class="col-md-12 text-center">
                                    <p>
                                        <a class="btn btn-danger" href="area_treinamento.php?idtr=<?=$_GET['idtr']?>"> CANCELAR </a>
                                        <button class="btn btn-warning">EDITAR</button>
                                    </p>
                                </div> 
                            
                            </div>
                        
                            </form>

                        </div>    
                    </div>

                </div>

            </div>

        </div>
        
    <footer></footer>    
    </body>
</html>