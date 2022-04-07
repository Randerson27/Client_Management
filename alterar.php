<?php
include("conexao.php");

session_start();

if(!isset($_SESSION["Email"]) || !isset($_SESSION['Senha'])){
    unset($_SESSION['Email']);
    unset($_SESSION['Senha']);
    header("Location:login.php?erro=true");
    exit;
  }else{
    $logado = $_SESSION['Email'];
    
  };

 //confirmar se os campos  existem

 if(isset($_POST["Nome"])){
     $id = $_POST["id"];
     $nome = $_POST["Nome"];
     $email = $_POST["Email"];
     $endereco = $_POST["Endereco"];
     $cpf = $_POST["Cpf"];

     //query
     $sql = "UPDATE clientes SET Nome = '{$nome}', Email = '{$email}', Endereco = '{$endereco}', Cpf = '{$cpf}' WHERE id = {$id}";
     $alteracao = mysqli_query($mysqli, $sql);

     if(!$alteracao){
         echo "erro";
     }else{
         header("location:listar.php");
     }
 }

  //consulta a tabela de clientes

  $clientes = "SELECT * FROM clientes ";
  
  if(isset($_GET["codigo"])){
      $id = $_GET["codigo"];
      $clientes .= " WHERE id = {$id}";
  }else{
      $clientes .= " WHERE id = 1";
  }

  $con_clientes = mysqli_query($mysqli, $clientes);
  if(!$con_clientes){
      die("erro banco");
  }else{
    $info_clientes = mysqli_fetch_assoc($con_clientes);
  }


?>
    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.js" rel="stylesheet">
        <link href="css/bootstrap.min.js" rel="stylesheet">
    
        <title>Gerenciador de Clientes</title>
      </head>
      <body>
        
        <header>
            <!-- Barra de Navegação-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="listar.php">ClientManagement</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav me-auto">
                    
                    </ul>
                    <form class="d-flex">
                    <a class="btn btn-danger" style="text-decoration:none; color:white;" href="logout.php">Sair</a>
                    </form>
                    </div>
                </div>
            </nav>
            <!--Fim Barra de Navegação-->

            <!--Formulario-->
              <div class="container">
                <div class="row justify-content-md-center mt-5">
                    <div class="col-md-5">
                        <div class="card border-primary mb-3">
                            <div class="card-header text-warning">ATENÇÃO</div>
                            <div class="card-body">
                                <h4 class="card-title">Tem certeza que deseja alterar este cliente?</h4>

                                <form action="alterar.php" id="nomeForm" name="nomeForm" method="POST">
                                  <label class="form-label" for="Nome">Nome</label>
                                  <input class="form-control" value="<?php echo $info_clientes["Nome"]?>" name="Nome" type="text">

                                  <label class="form-label" for="Email">Email</label>
                                  <input class="form-control" value="<?php echo $info_clientes["Email"]?>" name="Email" type="text" >

                                  <label class="form-label" for="Endereco">Endereco</label>
                                  <input class="form-control" value="<?php echo $info_clientes["Endereco"]?>" name="Endereco" type="text" >

                                  <label class="form-label" for="Cpf">Cpf</label>
                                  <input class="form-control" value="<?php echo $info_clientes["Cpf"]?>" name="Cpf" id="Cpf" type="text" >
                                    
                                  <input type="hidden" name="id" value="<?php echo $info_clientes["id"]?>">
                                  <input type="submit" class="mt-3 btn btn-warning" value="Confirmar alteração">

                                  <div>
                                    <input type="button" class="btn btn-dark mt-3" value="Voltar" onclick="btn_voltar()">
                                  </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
              </div>
            <!--Fim Formulario-->

        </header>

        <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/jquery.mask.js"></script>
        <script type="text/javascript" src="js/funcoes.js"></script>
        <!-- Validação de campos-->
        <script type="text/javascript">
          function btn_voltar(){
            window.location.href = "http://localhost/Gerenciador_de_Clientes/listar.php";
          };

          $(document).ready(function(){
            $("#Cpf").mask("999.999.999-99");
              $("#nomeForm").validate({
                  rules:{
                      Nome:{
                          required:true,
                          maxlength:50
                      },
                      Email:{
                          required:true,
                          maxlength:40
                      },

                      Endereco:{
                          required:true
                      }
                  }
              })
          })
        </script>
        <!--Fim validação-->
      </body>
    </html>
