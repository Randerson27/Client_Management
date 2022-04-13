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

  if(isset($_POST["Nome"])){
    $id = $_POST["id"];

    $sql = "DELETE FROM clientes WHERE id = {$id}";
    $result = mysqli_query($mysqli,$sql);

    if(!$result){
        die("erro no banco");
    }else{
        header("location:deletar.php");
    }
}

  if(isset($_GET["codigo"])){
    $id = $_GET["codigo"];

    $sql = "SELECT * FROM clientes WHERE id = {$id}";
    $consulta_sql = mysqli_query($mysqli, $sql);
    if(!$consulta_sql){
      die("erro no banco");
    }
  }else{
    header("location:listar.php");
  }

  $info_clientes = mysqli_fetch_assoc($consulta_sql);


?>
    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    
        <title>Gerenciador de Clientes</title>
      </head>
      <body>
        
        <header>
            <!-- Barra de Navegação-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="lista.php">ClientManagement</a>
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
                            <div class="card-header text-danger">ATENÇÃO</div>
                            <div class="card-body">
                                <h4 class="card-title">Tem certeza que deseja excluir este cliente?</h4>

                                <form action="deletar.php" method="POST">
                                  <label class="form-label" for="Nome">Nome</label>
                                  <input class="form-control" value="<?php echo $info_clientes["Nome"]?>" name="Nome" type="text">

                                  <label class="form-label" for="Email">Email</label>
                                  <input class="form-control" value="<?php echo $info_clientes["Email"]?>" name="Email" type="text">

                                  <label class="form-label" for="Endereco">Endereco</label>
                                  <input class="form-control" value="<?php echo $info_clientes["Endereco"]?>" name="Endereco" type="text">

                                  <label class="form-label" for="Cpf">Cpf</label>
                                  <input class="form-control" value="<?php echo $info_clientes["Cpf"]?>" name="Cpf" type="text">

                                  <label class="form-label" for="Data_nasc">Data Nascimento</label>
                                  <input class="form-control" value="<?php echo $info_clientes["Data_nasc"]?>" name="Data_nasc" type="date">
                                    
                                  <input type="hidden" name="id" value="<?php echo $info_clientes["id"]?>">
                                  <input type="submit" class="mt-3 btn btn-danger" value="Confirmar exclusão">

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
    
        <script type="text/javascript">
          function btn_voltar(){
            window.location.href = "http://localhost/Gerenciador_de_Clientes/listar.php";
          }
        </script>    
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
      </body>
    </html>
