<?php
    include("conexao.php");
    
   session_start();

    if(empty($_POST["Email"]) && empty($_POST["Senha"])){
        header("Location:login.php");
    }

    $email = mysqli_real_escape_string($mysqli, $_POST["Email"]);
    $senha = mysqli_real_escape_string($mysqli, $_POST["Senha"]);
    
    //validação de campos vazios
    if(empty($_POST["Email"]) || empty($_POST["Senha"])){
        header("Location:login.php?vazio=true");
        exit;
    }

    $query = "SELECT * FROM usuarios WHERE Email = '{$email}' and Senha = '{$senha}'";

    $result = mysqli_query($mysqli,$query);

    if(!$result){
        die("falha na conexao");
    }
    
    $informacao = mysqli_fetch_assoc($result);

    if(empty($informacao)){
        unset($_SESSION['Email']);
        unset($_SESSION['Senha']);
        header("Location:login.php?invalido=true");
        $erro = "Login sem sucesso";
    }else{
        $_SESSION['Email'] = $email;
        $_SESSION['Senha'] = $senha;
        header("Location:listar.php");
        exit();
    }

    //senha ou email invalidos
    if($informacao != $result){
        header("Location:login.php?invalido=true");
    }
?>
    

    
    
    
