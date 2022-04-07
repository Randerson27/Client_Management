<?php
include("conexao.php");
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
                    <a class="navbar-brand" href="#">Client Management</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarColor02">
                    </div>
                </div>
                </nav>
            <!--Fim Barra de Navegação-->

            <!--Caixa de login-->
            <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 mt-3">

                    <div class="card border-primary mb-4">
                        <div class="card-header"><h3>Seja Bem vindo</h3></div>
                        <div class="card-body">
                           
                            <form class="form-group" action="efetuar_login.php" method="post">
    
                                <label for="email" class="form-label ">Email</label>
                                <input type="email" class="form-control" name="Email" placeholder="Digite seu email">

                                <label for="senha" class="form-label mt-2">Senha</label>
                                <input type="password" class="form-control" name="Senha" placeholder="Digite sua senha">
                                
                                <div class="row justify-content-md-center">
                                    <input type="submit" class="col-md-3 btn btn-success mt-3" value="Login">
                                </div>
                                
                               
                                    <p class="mt-2 "><a  href="cadastro.php" class="text-primary text align center ">Cadastre-se aqui</a></p>
                                
                                </div>

                                <?php 
                                    if(isset($_GET["erro"])){
                                ?>
                                    <button class="btn btn-danger mb-2">
                                        <?php echo $erro = "Para acessar essa página é preciso logar"?>
                                    </button>
                                <?php
                                    }
                                ?>

                                <!--Senha ou email invalidos-->
                                <?php 
                                    if(isset($_GET["invalido"])){
                                ?>
                                    <button class="btn btn-danger mb-2">
                                        <?php echo $invalido = "Senha ou email invalidos"?>
                                    </button>
                                <?php
                                    }
                                ?>

                                    <!--Validação de campos vazios-->
                                    <?php 
                                    if(isset($_GET["vazio"])){
                                ?>
                                    <button class="btn btn-danger mb-2">
                                        <?php echo $vazio = "Preencha os campos vazios"?>
                                    </button>
                                <?php
                                    }
                                ?>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!--Fim caixa login-->

        </header>

        <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/jquery.mask.js"></script>
        <script type="text/javascript">
        
          
        </script>

      </body>
    </html>
