<?php
include("conexao.php");
//script de sessão
session_start();

if(!isset($_SESSION["Email"]) || !isset($_SESSION['Senha'])){
    unset($_SESSION['Email']);
    unset($_SESSION['Senha']);
    header("Location:login.php?erro=true");
    exit;
  }else{
    $logado = $_SESSION['Email'];
   
  };
  //fim script de sessão 


  //Sistema de filtragem de registros
  if(empty($_POST["busca"])){

    $sql = "SELECT * FROM clientes ";
      $result = $mysqli->query($sql);
  }else{
    $busca = $_POST["busca"];
   
        $sql = "SELECT * FROM clientes WHERE Nome LIKE'%$busca%' OR Email LIKE'%$busca%' ";
        $result = $mysqli->query($sql);
    
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

            
            <div>
              <div class="container">

                <!--Formulario de busca-->
                <form action="buscar.php" method="post">
                  <div class="input-group mb-3 mt-3">
                    <input type="text" name="busca" class="form-control" placeholder="Pesquise por um cliente">
                    <input type="submit" class="btn btn-button btn-success" value="Pesquisar"> 
                  </div>
                </form>
                <!--Fim formulario de busca-->

                <!--Tabela-->
                <table class="mt-2 table table-hover">
                  <thead>
                    <tr>
                      <th style="text-align:center;" scope="col">id</th>
                      <th style="text-align:center;" scope="col">Nome</th>
                      <th style="text-align:center;" scope="col">Email</th>
                      <th style="text-align:center;" scope="col">Endereço</th>
                      <th style="text-align:center;" scope="col">Cpf</th>
                      <th style="text-align:center;" scope="col"><input type="button" class="btn btn-primary" id="btn-adicionar" value="Adicionar" onClick="btn_adicionar()"></th>
                      
                    </tr>
                  </thead>
                  <tbody>

                     <?php
                      while($data = mysqli_fetch_assoc($result)){
                    ?>
                      <tr class="table-secondary">            
                        <th style="text-align:center;" scope="row"><?php echo $data["id"]?></th>
                        <td style="text-align:center;" ><?php echo $data["Nome"]?></td>
                        <td style="text-align:center;"><?php echo $data["Email"]?></td>
                        <td style="text-align:center;"><?php echo $data["Endereco"]?></td>
                        <td style="text-align:center;"><?php echo $data["Cpf"]?></td>
                        <td style="text-align:center;">
                          <a class="btn btn-warning" href="alterar.php?codigo=<?php echo $data["id"]?>"><img src="img/edit.png" width="25px"></a>

                          <a class="btn btn-danger" href="deletar.php?codigo=<?php echo $data["id"]?>"><img src="img/excluir.png" width="25px"></a>
                        </td>
                      
                      </tr>
                    <?php
                      }
                    ?>

                  </tbody>
                </table>
                <!--Fim Tabela-->
              </div>
            </div>
            

        </header>

        <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript">
         
            function btn_adicionar(){
              window.location.href = "http://localhost/Gerenciador_de_Clientes/inserir.php";
            }
          
        </script>

      </body>
    </html>
