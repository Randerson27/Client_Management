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

            <!--Caixa de cadastro-->
            <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 mt-3">

                    <div class="card border-primary mb-4">
                        <div class="card-header"><h3>Seja Bem vindo</h3></div>
                        <div class="card-body">
                           
                        <form class="form-group" action="efetuar_cadastro.php" method="POST">

                            <label for="nome" class="form-label mt-2">Nome</label>
                            <input type="name" class="form-control" name="Nome" placeholder="Digite seu nome">
    
                            <label for="email" class="form-label mt-2">Email</label>
                            <input type="email" class="form-control" name="Email" placeholder="Digite seu email">

                            <label for="senha" class="form-label mt-2">Senha</label>
                            <input type="password" class="form-control" name="Senha" placeholder="Crie uma senha">

                            <label for="senha-conirm" class="form-label mt-2">Confirme a senha</label>
                            <input type="password" class="form-control" name="Confirme_senha" placeholder="Digite a senha novamente">
       
                            <div>
                            <input type="submit" class="btn btn-success mt-2" value="Cadastrar">
                            </div>

                            <div>
                                <input type="button" class="btn btn-dark mt-3" value="Voltar" onclick="btn_voltar()">
                            </div>
                        
                            <!--Mensagem cadastrada no banco corretamente-->
                        <?php 
                                if(isset($_GET["enviado"])){
                            ?>
                                <button class="btn btn-success mt-2">
                                    <?php echo $enviado = "Cadastrado com sucesso!"?>
                                </button>
                            <?php
                                }
                                ?>

                            <!--Erro, senha ja existe-->
                            <?php 
                                if(isset($_GET["erro"])){
                            ?>
                                <button class="btn btn-danger mt-2">
                                    <?php echo $erro = "Email e senha ja exitem!"?>
                                </button>
                            <?php
                                }
                                ?>

                                <!--Erro, senha ja existe-->
                            <?php 
                                if(isset($_GET["incorreto"])){
                            ?>
                                <button class="btn btn-danger mt-2">
                                    <?php echo $incorreto = "Senhas incorretas!"?>
                                </button>
                            <?php
                                }
                                ?>

                                <!--Erro, campos vazios-->
                            <?php 
                                if(isset($_GET["vazio"])){
                            ?>
                                <button class="btn btn-danger mt-2">
                                    <?php echo $vazio = "Um ou mais campos vazios!"?>
                                </button>
                            <?php
                                }
                                ?>
                        
                        </form>

                        </div>
                    </div>
                </div>
            <!--Fim caixa cadastro-->

        </header>

        <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript">
        function btn_voltar(){
            window.location.href = "http://localhost/Gerenciador_de_Clientes/login.php";
          };
          
        </script>

      </body>
    </html>
