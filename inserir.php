
<?php

session_start();

if(!isset($_SESSION["Email"]) || !isset($_SESSION['Senha'])){
    unset($_SESSION['Email']);
    unset($_SESSION['Senha']);
    header("Location:login.php?erro=true");
    exit;
  }else{
    $logado = $_SESSION['Email'];
   
  };

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
            <div>
              <div class="container">
                <form action="inserir_cliente.php" name="nomeForm" id="nomeForm" method="POST">
                  <div class="col-md-5">

                    <div class="form-group">
                        <label for="nome" class="form-label mt-4">Nome</label>
                        <input type="name" class="form-control" id="Nome" name="Nome" placeholder="Nome completo">
                      </div>

                      <div class="form-group">
                        <label for="Email" class="form-label mt-4">Email</label>
                        <input type="name" class="form-control" id="Email" name="Email" placeholder="ex:jose@gmail.com">
                      </div>

                      <div class="form-group">
                        <label for="Endereco" class="form-label mt-4">Endereço</label>
                        <input type="name" class="form-control" id="Endereco" name="Endereco" placeholder="ex:avenida paulista 555">
                      </div>

                      <div class="form-group">
                        <label for="Cpf" class="form-label mt-4">CPF</label>
                        <input type="name" class="form-control" id="Cpf" name="Cpf" placeholder="ex:333.444.555.66">
                      </div>

                      <div class="mt-3 form-group">
                        <input type="submit" class="btn btn-primary" value="Cadastrar" onclick="validar()">
                      </div>

                      <div>
                        <input type="button" class="btn btn-dark mt-3" value="Voltar" onclick="btn_voltar()">
                      </div>

                  </div>
                </form>
              </div>
            </div>
            <!--Fim Formulario-->

        </header>

        <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
    
        <!-- Validação de campos-->
        <script type="text/javascript">
           function btn_voltar(){
            window.location.href = "http://localhost/Gerenciador_de_Clientes/listar.php";
          };
        
          $(document).ready(function(){
              $("#nomeForm").validate({
                  rules:{
                      Nome:{
                          required:true,
                          maxlength:50
                      },

                      Cpf:{
                          required:true,
                          maxlength:14,
                          minlength:14
                      },

                      Email:{
                          required:true,
                          maxlength:30,
                          minlength:3
                      },

                      Endereco:{
                          required:true
                      }
                  }
              })
          });

        </script>
        <!--Fim validação-->    
      </body>
    </html>
